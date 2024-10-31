<?php

namespace OurivesWeb\Controller\Orders;

use OurivesWeb\Controller\Connection;
use OurivesWeb\Helper\Error;
use OurivesWeb\Helper\Log;
use OurivesWeb\Helper\SweetAlert;
use OurivesWeb\Helper\Tools;
use OurivesWeb\Type\CloseInvoice;
use OurivesWeb\Type\InsertInvoice;
use OurivesWeb\Type\InsertInvoiceLine;
use OurivesWeb\Type\InvoicePdf;
use OurivesWeb\Type\InvoiceTransporte;
use WC_Customer;
use WC_Order;
use WC_Product;

/**
 * Class Documents
 * Used to create or update a OurivesWeb Document
 * @package OurivesWeb\Controller
 */
class Documents
{
    public $company = [];
    public $id_cliente;

    //InsertInvoice
public $tipo;
        public $obs = "";              //Tipo de DOC ,GetDocVend
    public $vendedor = "";
    public $condpag = "PP";
public $invoice_id;

    //InvoiceLine - Inserir Produto
    public $referencia;        //campo 'numero'
    public $codigo = null;
public $descricao;
    public $preco;         //nome do produto
        public $desconto = 0;             //Is on sale? get Sale Price : get Regular price
    public $quantidade;
public $iva;
        public $armazem = 1;               //get class tax -> get class %
    public $unidade = "null";
    public $ivaincluido = 0;
    public $seccao;

    //CloseInvoice
    public $order;

    //WooCommerce Order
    //misc
    public $products = [];
    public $documentType;
    public $ourivesweb_doc_ID;
    private $error = null;
    private $orderId;
    private $Morada_carga = null;
    private $Pais_carga = null;
    private $Postal_carga = null;
    private $Cidade_carga = null;

    private $Pais_descarga = null;
    private $Morada_descarga = null;
    private $Postal_descarga = null;
    private $Cidade_descarga = null;


    public function __construct($orderId)
    {
        if (!isset($_GET['document_type'])) {

            $this->orderId = $orderId;
            $this->order = new WC_Order((int)$orderId);
            $this->customer = new WC_Customer((int)$this->order->get_customer_id());
            $this->documentType = DOCUMENT_TYPE;
            return $this;
        } elseif (sanitize_text_field($_GET['document_type']) == "Selecione uma opção") {
            throw new Error('Tipo de documento não selecionado', 'error');
        }

        //recebe a OrderID e vai buscar a order completa
        $this->orderId = $orderId;
        $this->order = new WC_Order((int)$orderId);

        $this->customer = new WC_Customer((int)$this->order->get_customer_id());


        if (!defined('DOCUMENT_TYPE') && (!isset($_GET['document_type']))) {
            throw new Error(('Tipo de documento não definido nas opções'), ('error'));
        }
        //Get do Tipo do dumento atraves do modo selecionado (MANUAL) ou traves do DOCUMENT_TYPE (AUTOMATICO)
        $this->documentType = isset($_GET['document_type']) ? sanitize_text_field($_GET['document_type']) : DOCUMENT_TYPE;

        $status = $this->order->get_status();
        if ($status != "processing" && $status != "completed") {
            throw new Error(('Apenas é possivel emitir ' . $this->documentType . ' em encomendas que estão em fase de processamento'), ('error'));
        }
    }

    /**
     * Gets the error object
     * @return bool|Error
     */
    public function getError()
    {
        return $this->error ?: false;
    }

    public function removeDocument()
    {
        $this->ourivesweb_doc_ID = ($this->GET_ID_meta_data($this->documentType));
        if ($this->ourivesweb_doc_ID != null) {
            $this->order->delete_meta_data($this->documentType);
            $this->order->save_meta_data();
            SweetAlert::AnimatedNotify_Simple("success", "Documento " . $this->ourivesweb_doc_ID . " eliminado do WooCommerce.");
            return true;
        }
        SweetAlert::Button_Click("warning", "A encomenda selecionada não tem nenhum documento associado no WooCommerce.");
        return false;
    }

    private function GET_ID_meta_data($documentType)
    {
        if ($this->order->meta_exists($documentType)) {
            return $this->order->get_meta($documentType, true);
        }

        return false;
    }

    public function createDocument()
    {

        try {
            $Soap_Client = Connection::Soap_Client(null, null);

            $this->getDocumentSetId();

            $this->ourivesweb_doc_ID = ($this->GET_ID_meta_data($this->documentType));
            if ($this->ourivesweb_doc_ID == null) {
                $this->customer_id = ((new OrderCustomer($this->customer))->create($Soap_Client));
                Log::write('A Criar novo Documento ' . $this->documentType . ': Comprador: ' . $this->customer_id . ' ');
                $result = $Soap_Client["Obj"]->InsertInvoice(new InsertInvoice($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $this->customer_id, $this->documentType, $this->obs, $this->vendedor, $this->condpag));
                $this->ourivesweb_doc_ID = $result->getInsertInvoiceResult();
                $this->SET_ID_meta_data($this->ourivesweb_doc_ID);
                $this->order->save_meta_data();
            } else {

                self::showDocument($Soap_Client, $this->ourivesweb_doc_ID, "Documento " . $this->ourivesweb_doc_ID . " já existe.", "warning");
                throw new Error($this->ourivesweb_doc_ID . ' Já existe no OurivesWeb', 'warning');
            }

            //ALTURA DE INVOCAR FUNÇÕES
            $this
                ->setProducts($Soap_Client)
                ->setShipping($Soap_Client, $this->ourivesweb_doc_ID);


            // If the documents is going to be inserted as closed
            if (defined('DOCUMENT_STATUS') && DOCUMENT_STATUS) {
                self::showDocument($Soap_Client, $this->ourivesweb_doc_ID, "O documento " . $this->ourivesweb_doc_ID . " foi criado e guardado como rascunho com sucesso!", "success");
            } else {
                $result = $Soap_Client["Obj"]->CloseInvoice(new CloseInvoice($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $this->ourivesweb_doc_ID, (int)DOCUMENT_SET_ID));
                $this->ourivesweb_doc_ID = $result->getCloseInvoiceResult();
                $this->order->update_meta_data($this->documentType, $this->ourivesweb_doc_ID);
                $this->order->save_meta_data();
                $temp_link = self::showDocument($Soap_Client, $this->ourivesweb_doc_ID, "O documento " . $this->ourivesweb_doc_ID . " foi criado e fechado com sucesso!", "success");
                $this->order->update_status("completed", "O documento " . $this->ourivesweb_doc_ID . " está fechado e está disponível no OurivesWeb e disponível temporariamente através do seguinte link: " . $temp_link . " .");
                $this->order->save();
            }
        } catch (Error $error) {
            $this->document_id = 0;
            $this->error = $error;
        }

        return $this->order;
    }

    /**
     * @return int
     * @throws Error
     */
    public function getDocumentSetId()
    {
        if (defined('DOCUMENT_SET_ID') && (int)DOCUMENT_SET_ID > 0) {
            return DOCUMENT_SET_ID;
        }
        throw new Error('Série de documentos em falta. <br>Por favor insira um valor em "Série de documento', 'error');
        exit();
    }

    private function SET_ID_meta_data($ourivesweb_doc_ID)
    {
        return $this->order->add_meta_data($this->documentType, $ourivesweb_doc_ID, true);
    }

    /**
     * This method will download a document if it is closed
     * Or it will redirect to the OurivesWeb edit page
     * @param $documentId
     * @return bool
     * @throws Error
     */
    public static function showDocument($Soap_Client, $documentId, $Mesage, $type)
    {
        $response = $Soap_Client["Obj"]->InvoicePdf(new InvoicePdf($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $documentId));
        $temp = $response->getInvoicePdfResult();
        if (!isset($temp)) {
            return "";
        }
        if ($temp == "-4") {
            SweetAlert::Button_Click("error", "Este Documento não existe");
            return "";
        }
        SweetAlert::AnimatedNotifyPDF($type, $Mesage, $temp);
        return $temp;
    }

    public function setShipping($Soap_Client, $numero)
    {
        //if (defined('SHIPPING_INFO') && SHIPPING_INFO) {


        //$shippingName = $this->order->get_shipping_method();
        //if (empty($shippingName)) {
        //    return $this;
        //}
        $this->Pais_descarga = $this->customer->get_shipping_country();
        $this->Postal_descarga = $this->customer->get_shipping_postcode();
        $this->Cidade_descarga = $this->customer->get_shipping_city();
        $this->Morada_descarga = $this->customer->get_shipping_address_1() . $this->customer->get_shipping_address_2();


        $Result = $Soap_Client["Obj"]->InvoiceTransporte(new InvoiceTransporte(
            $Soap_Client["access_data"][0],
            $Soap_Client["access_data"][1],
            $numero,
            $this->Morada_descarga,
            $this->Cidade_descarga,
            $this->Postal_descarga,
            $this->Pais_descarga,
            $this->Morada_carga,
            $this->Cidade_carga,
            $this->Postal_carga,
            $this->Pais_carga
        ));

        $ioaghiwuhgw = $this->order->get_shipping_method();


        $this->descricao = "Transporte";
        $this->referencia = null;
        //is on sale? get Sale Price : get Regular price
        $this->preco = $this->order->get_shipping_total();
        //is taxable? calculate Tax % : set to 0
        try {
            if ($this->order->get_shipping_tax() == 0) {
                $this->iva = 0;
            } else {
                $this->iva = round(((($this->order->get_shipping_tax()) * 100) / $this->order->get_shipping_total()), 0);
            }
        } catch (Error $error) {
            $this->iva = 0;
        }

        $this->quantidade = 1;
        $this->unidade = "UNI";
        $this->codigo = null;        //$orderProduct->;
        $this->desconto = 0;           //$orderProduct->;
        $this->armazem = 0;           //$orderProduct->;
        $this->unidade = null;        //$orderProduct->;
        $this->ivaincluido = 0;           //$orderProduct->;

        $Result = $Soap_Client["Obj"]->InsertInvoiceLine(new InsertInvoiceLine(
            $Soap_Client["access_data"][0],
            $Soap_Client["access_data"][1],
            $this->ourivesweb_doc_ID,
            $this->referencia,
            $this->codigo,
            $this->descricao,
            $this->preco,
            $this->quantidade,
            $this->desconto,
            $this->iva,
            $this->armazem,
            $this->unidade,
            $this->ivaincluido
        ));
        return $this;
    }

    /**
     * @return $this
     * @throws Error
     */
    private function setProducts($Soap_Client)
    {

        foreach ($this->order->get_items() as $itemIndex => $orderProduct) {

            $product = new WC_Product((int)$orderProduct->get_product_id());

            $this->descricao = $orderProduct->get_name();
            $this->referencia = $product->get_sku();


            //is on sale? get Sale Price : get Regular price
            $product->is_on_sale() ? $this->preco = $product->get_sale_price() : $this->preco = $product->get_regular_price();
            //is taxable? calculate Tax % : set to 0
            try {
                if (($orderProduct->get_total_tax() != 0)) {
                    $product->is_taxable() ? $this->iva = round((($orderProduct->get_total_tax()) * 100) / $orderProduct->get_total(), 0) : $this->iva = 0;
                } else {
                    $this->iva = 0;
                }
            } catch (Error $error) {
                $this->iva = 0;
            }


            $this->quantidade = $orderProduct->get_quantity();
            $this->codigo = null;        //$orderProduct->;
            $this->desconto = 0;           //$orderProduct->;
            $this->armazem = 0;           //$orderProduct->;
            $this->unidade = null;        //$orderProduct->;
            $this->ivaincluido = 0;           //$orderProduct->;

            $Result = $Soap_Client["Obj"]->InsertInvoiceLine(new InsertInvoiceLine(
                $Soap_Client["access_data"][0],
                $Soap_Client["access_data"][1],
                $this->ourivesweb_doc_ID,
                $this->referencia,
                $this->codigo,
                $this->descricao,
                $this->preco,
                $this->quantidade,
                $this->desconto,
                $this->iva,
                $this->armazem,
                $this->unidade,
                $this->ivaincluido
            ));
        }

        return $this;
    }
}
