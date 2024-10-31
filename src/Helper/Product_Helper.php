<?php

namespace OurivesWeb\Helper;

use Exception;
use OurivesWeb\Type\GetArtigoStockRef;

class Product_Helper
{

    public static function TimeCalculator($artigo, $name, $meta_data)
    {
        try {
            return ($meta_data - intval(strtotime($artigo->dat_hor)));
        } catch (Error $error) {
            Log::write("Erro na conversão de dat_hor com o seguinte valor" . $artigo->dat_hor . "/n");
            Log::write("Do seguinte artigo" . $name . "/n");
            $error->showError();
        }
    }

    public static function StockCalculator($name, $ref, $prod, $Soap_Client)
    {
        try {
            $meta_data_Stock = $prod->get_meta("stockLastUpdate");

            //check stockLastUpdate == OurivesWebStock
            $response = $Soap_Client["Obj"]->GetArtigoStockRef(new GetArtigoStockRef($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $ref));
            $temp = $response->getGetArtigoStockRefResult();
            if ($temp == '-1')
                return true;
            $xml = simplexml_load_string($temp);
            $stock = 0;
            foreach ($xml->children() as $stk) {
                $stock += $stk->stock_actual;
            }
            if ($meta_data_Stock == $stock)
                return true;
            else
                return false;
        } catch (Error $error) {
            Log::write("Erro na busca do stock   ");
            Log::write("Do seguinte artigo" . $name . "/n");
            $error->showError();
        }
    }

    public static function reset_date_hora_WC($New_artigo, $prod)
    {
        try {
            remove_action("woocommerce_update_product", "\OurivesWeb\Plugin::productUpdated");
            $prod->update_meta_data("date_modified", strtotime($New_artigo->dat_hor));
            $prod->save();
        } catch (Exception $error) {
            Log::write('New-artigo: ' . $New_artigo->nome . "/n");
            Log::write('Erro: ' . $error . "/n");
        }
    }

    public static function settings_defined()
    {
        if (!defined('PVP_PRICE') || !defined('PVP_SALE')) {
            throw new Error('Tipo de PVP não selecionado', 'error');
        }
        if (
            !defined('IMPORT_FAMILIA') || !defined('IMPORT_SUBFAMILIA') || !defined('IMPORT_DESC') ||
            !defined('IMPORT_MATERIA') || !defined('IMPORT_SUBMATERIA') || !defined('IMPORT_IMAGEM') ||
            !defined('IMPORT_TOQUE') || !defined('IMPORT_MARCA') || !defined('IMPORT_WEIGHT') ||
            !defined('IMPORT_COLECAO') || !defined('IMPORT_GENERO') || !defined('IMPORT_TEMA') ||
            !defined('IMPORT_CUSTOPDR') || !defined('IMPORT_ORIGEM')
        )
            throw new Error('Seleção dos parametros a serem atualizados não selecionado', 'error');

    }

    public static function Get_Referencia($artigo)
    {

        if (empty(trim($artigo->descrição)))
            return null;
        else if (!trim($artigo->referencia) == null || !trim($artigo->referencia) == "") {
            return trim($artigo->referencia);
        } else {
            return null;
        }
    }
}
