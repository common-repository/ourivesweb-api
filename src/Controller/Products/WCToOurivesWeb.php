<?php

namespace OurivesWeb\Controller\Products;

use Exception;
use OurivesWeb\Controller\Connection;
use OurivesWeb\Helper\Log;
use OurivesWeb\Type\EditArtigo;
use OurivesWeb\Type\UpLoadImage;
use WC_Product;

/**
 * Atualização do WooCommerce para o OurivesWeb
 * Comparação da Lista total de SKU e Lista total de Referencias
 * Os SKU's que não estão presentes na lista de Referencias, são adicionados ao OurivesWeb.
 */
class WCToOurivesWeb
{

    public function __construct()
    {
        return $this;
    }


    public function Update_WC_ToOurivesWeb()
    {
        Log::write('Update_WC_ToOurivesWeb ');

        $this->Soap_Client = Connection::Soap_Client(NULL, NULL);
        $products = wc_get_products(array('limit' => -1));

        $conexao_WC = Connection::Soap_Client("GetArtigos", "getGetArtigosResult");
        $xml_OurivesWeb = simplexml_load_string($conexao_WC) or die("Error: Cannot create object");
        $xml_WC = self::Get_List_Of_SKU($products);
        $List_sku_OurivesWeb = self::Get_List_Of_Referencias($xml_OurivesWeb);

        foreach ($xml_WC as $sku) {
            if (!(in_array($sku, $List_sku_OurivesWeb)) && ($sku != "")) {
                $this->wcProductId = wc_get_product_id_by_sku(trim($sku));
                $this->wcproduct = new WC_Product($this->wcProductId);
                $this->SendToOurivesWeb($this->wcproduct, $this->Soap_Client);
            }
        }
        Log::write('Finsihed Update_WC_ToOurivesWeb');
    }

    public static function Get_List_Of_SKU($products)
    {
        $sku_WC = array();
        foreach ($products as $product) {
            array_push($sku_WC, trim($product->get_sku()));
        }
        return $sku_WC;
    }

    public static function Get_List_Of_Referencias($xml)
    {

        $sku_OurivesWeb = array();
        foreach ($xml->children() as $artigo) {

            array_push($sku_OurivesWeb, trim($artigo->referencia[0]));
        }
        return $sku_OurivesWeb;
    }

    public static function SendToOurivesWeb($wcproduct, $Soap_Client)
    {

        $pvp1 = $pvp2 = $pvp3 = $pvpiva1 = $pvpiva2 = $pvpiva3 = "null";
        switch (sanitize_text_field(PVP_PRICE)) {
            case "pvp1":
                $pvp1 = ($wcproduct->get_regular_price());
                break;
            case "pvp2":
                $pvp2 = ($wcproduct->get_regular_price());
                break;
            case "pvp3":
                $pvp3 = ($wcproduct->get_regular_price());
                break;
            case "pvpiva1":
                $pvpiva1 = ($wcproduct->get_regular_price());
                break;
            case "pvpiva2":
                $pvpiva2 = ($wcproduct->get_regular_price());
                break;
            case "pvpiva3":
                $pvpiva3 = ($wcproduct->get_regular_price());
                break;
            default:
                break;
        }
        switch (sanitize_text_field(PVP_SALE)) {
            case "pvp1":
                $pvp1 = ($wcproduct->get_sale_price());
                break;
            case "pvp2":
                $pvp2 = ($wcproduct->get_sale_price());
                break;
            case "pvp3":
                $pvp3 = ($wcproduct->get_sale_price());
                break;
            case "pvpiva1":
                $pvpiva1 = ($wcproduct->get_sale_price());
                break;
            case "pvpiva2":
                $pvpiva2 = ($wcproduct->get_sale_price());
                break;
            case "pvpiva3":
                $pvpiva3 = ($wcproduct->get_sale_price());
                break;
            default:
                break;
        }

        try {
            if (wc_get_price_excluding_tax($wcproduct, array()) > 0) {
                $iva = round((wc_get_price_including_tax($wcproduct, array()) * 100 / wc_get_price_excluding_tax($wcproduct, array())), 0) - 100;
            }
        } catch (Exception $ex) {
            $iva = 0;
        }
        if (empty($iva)) $iva = 0;

        $custoPDR = 'null';
        if (sanitize_text_field(IMPORT_CUSTOPDR)) {
            $custoPDR = $wcproduct->get_meta('custoPdr') ?: 'null';
        }
        $Brand_Export = 'null';
        if (sanitize_text_field(IMPORT_MARCA)) {
            $Brand_Export = $wcproduct->get_meta('Marca') ?: 'null';
        }
        $weight_Export = 'null';
        if (sanitize_text_field(IMPORT_WEIGHT)) {
            $ww = $wcproduct->get_weight();
            (empty($ww) || $ww == "0.00") ? $weight_Export = "null" : $weight_Export = $ww;
        }
        $Desc_Exp = 'null';
        if (sanitize_text_field(IMPORT_DESC)) {
            $Desc = $wcproduct->get_description();
            (empty($ww) || $ww == "") ? $Desc_Exp = "null" : $Desc_Exp = $Desc;
        }


        // IMPORT_IMAGEM

        $response = $Soap_Client["Obj"]->EditArtigo(new EditArtigo(
            ($Soap_Client["access_data"][0]),
            ($Soap_Client["access_data"][1]),
            ($wcproduct->get_sku()), //referencia
            ($wcproduct->get_name()), //Descrição
            "", //codigo
            $Brand_Export, //marca
            "null", //<unidade>     -- not using
            "null", //<codbarra>    -- not using
            "null", //<refer2>      -- not using
            $pvp1, //<pvp1>
            $pvp2, //<pvp2>
            $pvp3, //<pvp3>
            $pvpiva1, //<pvpIva1>      -- not using
            $pvpiva2, //<pvpIva2>      -- not using
            $pvpiva3, //<pvpIva3>      -- not using
            "null", //<custoIli>      -- not using
            $custoPDR, //<custoPdr>
            "null", //<custoUlt>      -- not using
            "null", //<margem1>      -- not using
            "null", //<margem2>      -- not using
            "null", //<margem3>      -- not using
            ($iva), //<iva>
            $weight_Export, //peso
            "", //<ultFor>
            "null", //familia
            "" //subfamilia
        ));


        $temp = $response->getEditArtigoResult();
        if ($temp == "-1" || $temp == "-2" || $temp == "-3" || $temp == "-4")
            return false;
        if (defined(IMPORT_IMAGEM) || sanitize_text_field(IMPORT_IMAGEM) == 1) {

            $image = $wcproduct->get_image('woocommerce_thumbnail', array(), false);
            preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $image, $matches);
            $url = $matches[1][0] ?? '';
            $arrContextOptions = array("ssl" => array("verify_peer" => false, "verify_peer_name" => false));
            $product_image_ids = $wcproduct->get_gallery_image_ids();
            foreach ($product_image_ids as $product_image_id) {
                $image_url = esc_url(wp_get_attachment_url($product_image_id));
                if (!empty($image_url)) {
                    $b64image = base64_encode(file_get_contents($image_url, false, stream_context_create($arrContextOptions)));
                    if (!empty($b64image)) {
                        $response = $Soap_Client["Obj"]->UpLoadImage(new UpLoadImage($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], "WooCommerce_Image", $temp, $b64image));
                        $ImageResponse = $response->getUpLoadImageResult();
                    }
                }
            }
            unset($ImageResponse);
            unset($image_url);
            unset($b64image);
            unset($response);
            unset($image);
            unset($url);
        }
    }
}
