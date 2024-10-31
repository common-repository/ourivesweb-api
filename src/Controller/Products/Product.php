<?php

namespace OurivesWeb\Controller\Products;


use Exception;
use OurivesWeb\Controller\Connection;
use OurivesWeb\Helper\Log;
use OurivesWeb\Helper\Product_Helper;
use OurivesWeb\Helper\SweetAlert;
use OurivesWeb\Helper\TextWriters;
use OurivesWeb\Type\GetArtigoRef;
use WC_Product;

/**
 * Class Product
 * @package OurivesWeb\Controller
 */
class Product
{
    private $wcproduct;
    private $inativo;
    private $wcProductId;
    private $meta_data;
    private $Soap_Client;
    private $ref;
    private $inactive = array('Produtos:');

    public function __construct()
    {
        return $this;
    }


    public function Update_OurivesWeb_ToWC()
    {
        SweetAlert::Button_Click("info", "Sincronização a decorrer");
        Product_Helper::settings_defined();
        $File_name = (date('Y-m-d_H-i-s') . ".html");
        $index = $No_Need_index = $WC_index = $this->inativo = $OurivesWeb_index = $error_index = 0;
        $tempo = time();

        Log::phpCreateFile($File_name); //Cria documento
        Log::write(OURIVES_DIVIDER . "<br/>" . OURIVES_DIVIDER . "<br/>");
        Log::write('-----> Update Started');
        Log::write('---->  Report is :' . $File_name);

        //Buscar Produtos
        $conexao_WC = Connection::Soap_Client("GetArtigos", "getGetArtigosResult");
        $xml = simplexml_load_string($conexao_WC) or die("Error: Cannot create object");
        $this->Soap_Client = Connection::Soap_Client(NULL, NULL);
        //Itera todos os artigos recebidos

        foreach ($xml->children() as $artigo) {
            if (($artigo->web) == "true" || ($artigo->inactivo) == "true") {
                if ($artigo->código != null)
                    array_push($this->inactive, trim($artigo->código));
                $this->inativo++;
                continue;
            }
            $this->ref = Product_Helper::Get_Referencia($artigo);
            if ($this->ref == null || $artigo->descrição == null) {
                Log::write('/----> Artigo:' . trim($artigo->código) . " || " . trim($artigo->descrição) . " não contem SKU ou não contém descrição");
                continue;
            }
            Log::write('----> Analisar Artigo:' . trim($artigo->código) . " || " . $this->ref);
            //Busca produto no WC
            $this->wcProductId = wc_get_product_id_by_sku($this->ref);
            $this->wcproduct = new WC_Product($this->wcProductId);

            $index++;   //index do Relatorio
            $name = trim($artigo->descrição); //Guarda nome para colocar no Relatorio

            if (!empty($this->wcProductId)) {
                $diff_stock = Product_Helper::StockCalculator($name, $this->ref, $this->wcproduct, $this->Soap_Client);

                !$diff_stock ?
                    $diff_times = (-300) :
                    $diff_times = Product_Helper::TimeCalculator($artigo, $name, $this->wcproduct->get_meta("date_modified"));

                if (abs($diff_times) < 30) {
                    $No_Need_index = TextWriters::NoNeeed($File_name, $index, $name, $No_Need_index);
                    Log::write('---> Sem Necessidade de atualização');
                    continue;
                } else {
                    if ($diff_times > 30) $i = "Update_OurivesWeb";
                    if ($diff_times < -30) $i = "Update_WC";

                    switch ($i) {
                        case "Update_OurivesWeb":
                        {
                            // WooCommerce é o recente -> atualiza OurivesWeb -> atualiza dat_hora no WooCommerce para ambos ficarem com a mesma Dat_hor.
                            try {
                                Log::write('---> Woocommerce é o mais recente');
                                WCToOurivesWeb::SendToOurivesWeb($this->wcproduct, $this->Soap_Client);
                                Log::write('--> Atualiza OurivesWeb');
                                $response = $this->Soap_Client["Obj"]->GetArtigoRef(new GetArtigoRef($this->Soap_Client["access_data"][0], $this->Soap_Client["access_data"][1], $this->wcproduct->get_sku()));
                                $temp = $response->getGetArtigoRefResult();
                                $xml = simplexml_load_string($temp);
                                foreach ($xml->children() as $New_artigo) {
                                    Product_Helper::reset_date_hora_WC($New_artigo, $this->wcproduct);
                                    $WC_index = TextWriters::WriteWC($File_name, $index, $name, $WC_index);
                                    Log::write('--> Atualiza datetime no WooCommerce para: ' . $New_artigo->dat_hor);
                                }
                            } catch (Exception $error) {
                                $OurivesWeb_index = TextWriters::Error($File_name, $index, $name, $error, $error_index);
                            }
                            break;
                        }
                        case "Update_WC":
                        {
                            //Atualização no wooCommerce
                            try {
                                Log::write('---> OurivesWeb é o mais recente');

                                $this->wcproduct = (new ParseValues($this->wcproduct))->mapPropsToArray($artigo, $this->Soap_Client, $this->ref);
                                remove_action("woocommerce_update_product", "\OurivesWeb\Plugin::productUpdated");
                                $this->wcproduct->save();
                                Log::write('--> Atualiza WooCommerce');
                                $OurivesWeb_index = TextWriters::WriteOurivesWeb($File_name, $index, $name, $OurivesWeb_index);
                            } catch (Exception $error) {
                                $OurivesWeb_index = TextWriters::Error($File_name, $index, $name, $error, $error_index);
                            }
                            break;
                        }
                        default:
                        {
                            $No_Need_index = TextWriters::NoNeeed($File_name, $index, $name, $No_Need_index);
                            Log::write('---> Sem Necessidade de atualização');
                            unset($this->ref);
                            Log::phpWrite($File_name, '</tr>');
                            break;
                        }
                    }
                }
            } else {
                Log::write('---> Cria o produto no WooCommerce');
                $this->wcproduct = (new ParseValues($this->wcproduct))->mapPropsToArray($artigo, $this->Soap_Client, $this->ref);
                remove_action("woocommerce_update_product", "\OurivesWeb\Plugin::productUpdated");
                $id_product = $this->wcproduct->save();
                Log::write('--> Produto criado');
                if (sanitize_text_field(IMPORT_IMAGEM)) {
                    $number_img = (new ParseValues($this->wcproduct))->GetImages($this->Soap_Client, $this->wcproduct, $id_product);
                    if ($number_img != 0) Log::write('--> ' . $number_img . ' imagens importadas');
                }
                $OurivesWeb_index = TextWriters::WriteOurivesWeb($File_name, $index, $name, $OurivesWeb_index);
            }
            //! DEBUG MODE
            // Log::phpWrite($File_name, '</tr>');
            //  if ($WC_index + $No_Need_index + $this->inativo > 450) {
            //      break;
            //  }

            $WC_index++;
            unset($this->ref);
        }
        Log::write("-------->   Artigos não ativos:[" . implode("','", $this->inactive) . "] ");
        TextWriters::Finish($File_name, $WC_index, $OurivesWeb_index, $No_Need_index, $this->inativo, $error_index, $tempo);
        return $File_name;
    }
}
