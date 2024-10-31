<?php

namespace OurivesWeb\Controller\Products;

use DateTime;
use OurivesWeb\Helper\Cat_meta_data;
use OurivesWeb\Helper\Error;
use OurivesWeb\Helper\Log;
use OurivesWeb\Type\GetArtigosImageList;
use wp_insert_category;

class ParseValues
{

    private $wcproduct;

    /**
     * Mapp Values to array. Dados recebidos do OurivesWeb.
     * Este array servirá para inserir valores no inventário do WooCommerce.
     */

    public function __construct($wcproduct)
    {
        return $this->wcproduct = $wcproduct;
    }

    public static function GetImages($Soap_Client, $wcproduct, $id)
    {
        if (sanitize_text_field(IMPORT_IMAGEM) == 0)
            return true;
        try {

            $response = $Soap_Client["Obj"]->GetArtigosImageList(new GetArtigosImageList(trim($Soap_Client["access_data"][0]), trim($Soap_Client["access_data"][1]), "", $wcproduct->get_sku()));
            $temp = $response->getGetArtigosImageListResult();
            $xml = simplexml_load_string($temp);
            $i = 0;
            if (!empty($xml)) {
                $Array_images = [];
                foreach ($xml->children() as $img) {
                    $i++;
                    //HANDLE UPLOADED FILE
                    $imgurl = $img->url;
                    $upload_dir = wp_upload_dir();          //Returns an array containing the current upload directory’s path and URL.

                    $upload_path = str_replace('/', DIRECTORY_SEPARATOR, $upload_dir['path']) . DIRECTORY_SEPARATOR; //substitui os / para directory
                    $image_parts = explode(";base64,", $imgurl);
                    $decoded = base64_decode($image_parts[1]);
                    $filename = 'ProdImg.png';
                    $hashed_filename = $wcproduct->get_sku() . "_" . $i . "_" . $filename;
                    $image_upload = file_put_contents($upload_path . $hashed_filename, $decoded);

                    // Without that I'm getting a debug error!?
                    $file = array();
                    $file['error'] = '';
                    $file['tmp_name'] = $upload_path . $hashed_filename;
                    $file['name'] = $hashed_filename;
                    $file['type'] = 'image/png';
                    $file['size'] = filesize($upload_path . $hashed_filename);
                    // upload file to server

                    // use $file instead of $image_upload
                    $file_return = wp_handle_sideload($file, array('test_form' => false));
                    $filename = $file_return['file'];
                    $attachment = array(
                        'post_mime_type' => $file_return['type'],
                        'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                        'post_content' => '',
                        'post_status' => 'inherit',
                        'guid' => $upload_dir['url'] . '/' . basename($filename)
                    );

                    $attach_id = wp_insert_attachment($attachment, $filename);
                    /// generate thumbnails of newly uploaded image
                    $attachment_meta = wp_generate_attachment_metadata($attach_id, $filename);
                    wp_update_attachment_metadata($attach_id, $attachment_meta);
                    array_push($Array_images, $attach_id);
                }
                $MainImages = array_shift($Array_images);
                remove_action("woocommerce_update_product", "\OurivesWeb\Plugin::productUpdated");
                $wcproduct->save();
                set_post_thumbnail($id, $MainImages);
                $wcproduct->set_image_id($MainImages);

                unset($Array_images, $imgurl, $upload_dir, $filename, $hashed_filename, $image_parts, $upload_path);
                unset($decoded, $image_upload, $file, $file_return, $filename, $attachment, $attach_id, $attachment_meta, $MainImages);
                unset($response, $temp, $xml);
            }
        } catch (Error $error) {
            Log::write("Erro ao adicionar uma imagem num produto" . $error . '');
        }
        return $i;
    }

    public function mapPropsToArray($artigo, $Soap_Client, $ref)
    {
        $this->wcproduct->set_name(trim($artigo->descrição));
        if (trim($artigo->catalogo))
            $this->wcproduct->update_meta_data("catalogo", trim($artigo->catalogo));

        if (sanitize_text_field(IMPORT_DESC))
            $this->wcproduct->set_description(trim($artigo->observações));
        if (sanitize_text_field(IMPORT_WEIGHT))
            $this->wcproduct->set_weight(trim($artigo->peso));
        if (sanitize_text_field(IMPORT_MARCA))
            $this->wcproduct->set_attributes(array(0, "Marca", "", 0, true, false), trim($artigo->marca));
        if (sanitize_text_field(IMPORT_CUSTOPDR))
            $this->wcproduct->update_meta_data("custoPdr", trim($artigo->custo_pdr));
        if (sanitize_text_field(IMPORT_MATERIA))
            $this->wcproduct->update_meta_data("Materia", trim($artigo->aplicação));
        if (sanitize_text_field(IMPORT_SUBMATERIA))
            $this->wcproduct->update_meta_data("SubMateria", trim($artigo->aplicação2));
        if (sanitize_text_field(IMPORT_TOQUE))
            $this->wcproduct->update_meta_data("Toque", trim($artigo->modelo));
        if (sanitize_text_field(IMPORT_COLECAO))
            $this->wcproduct->update_meta_data("Colecao", trim($artigo->coleção));
        if (sanitize_text_field(IMPORT_GENERO))
            $this->wcproduct->update_meta_data("Genero", trim($artigo->genero));
        if (sanitize_text_field(IMPORT_TEMA))
            $this->wcproduct->update_meta_data("Tema", trim($artigo->tema));
        if (sanitize_text_field(IMPORT_ORIGEM))
            $this->wcproduct->update_meta_data("Origem", trim($artigo->pais));

        $this->wcproduct->update_meta_data("stockLastUpdate", trim($artigo->stock_actual));

        $this->wcproduct->set_sku($ref);

        //Meta Data->[date_modified],[Marca],[Modelo]
        $this->wcproduct->update_meta_data("date_modified", strtotime($artigo->dat_hor));
        $this->wcproduct->set_tax_status("taxable");
        $this->wcproduct->set_tax_class("OurivesWeb IVA" . trim($artigo->iva2));
        if (empty($this->wcproduct->get_status())) {
            (defined("IMPORT_STATUS") && IMPORT_STATUS) ? $this->wcproduct->set_status("draft") : $this->wcproduct->set_status("publish");
        }

        if (empty($this->wcproduct->get_date_on_sale_to()))
            $this->wcproduct->set_date_on_sale_to((new DateTime('2020-01-01'))->format('Y-m-d'));


        // Preço de produto e preço de promoção
        switch (sanitize_text_field(PVP_PRICE)) {
            case "pvp1":
                $this->wcproduct->set_regular_price(trim($artigo->pvp1));
                break;
            case "pvp2":
                $this->wcproduct->set_regular_price(trim($artigo->pvp2));
                break;
            case "pvp3":
                $this->wcproduct->set_regular_price(trim($artigo->pvp3));
                break;
            case "pvpiva1":
                $this->wcproduct->set_regular_price(trim($artigo->pvpiva1));
                break;
            case "pvpiva2":
                $this->wcproduct->set_regular_price(trim($artigo->pvpiva2));
                break;
            case "pvpiva3":
                $this->wcproduct->set_regular_price(trim($artigo->pvpiva3));
                break;
            default:
                break;
        }
        switch (sanitize_text_field(PVP_SALE)) {
            case "pvp1":
                $this->wcproduct->set_sale_price(trim($artigo->pvp1));
                break;
            case "pvp2":
                $this->wcproduct->set_sale_price(trim($artigo->pvp2));
                break;
            case "pvp3":
                $this->wcproduct->set_sale_price(trim($artigo->pvp3));
                break;
            case "pvpiva1":
                $this->wcproduct->set_sale_price(trim($artigo->pvpiva1));
                break;
            case "pvpiva2":
                $this->wcproduct->set_sale_price(trim($artigo->pvpiva2));
                break;
            case "pvpiva3":
                $this->wcproduct->set_sale_price(trim($artigo->pvpiva3));
                break;
            default:
                break;
        }
        /**
         *              Categoria / Sub-Categoria
         *
         *  Necesário passar parametro como Array()
         *  Desta forma a stdclass recebida é transformada em array
         */
        $category_ID = array();
        if (sanitize_text_field(IMPORT_FAMILIA)) {
            if (strval($artigo->família) != NULL && strval($artigo->família) != "0") {
                $cat = Cat_meta_data::Calculator_Categoria($Soap_Client, intval($artigo->família));
                if ($cat != NULL) {
                    array_push($category_ID, $cat);
                }
            }
        }
        if (sanitize_text_field(IMPORT_SUBFAMILIA)) {
            if (strval($artigo->subfamília) != NULL && strval($artigo->subfamília) != "0") {
                $cat = Cat_meta_data::Calculator_Sub_Categoria($Soap_Client, "sub" . intval($artigo->subfamília));
                if ($cat != NULL) {
                    array_push($category_ID, $cat);
                }
            }
        }
        if (!empty($category_ID)) {
            $this->wcproduct->set_category_ids($category_ID);
        }
        /**
         *  Calculo do Stock
         */
        $this->wcproduct->set_manage_stock(true);
        $this->wcproduct->set_stock_quantity(intval($artigo->stock_actual));
        ($artigo->stock_actual) < ($artigo->stock_minimo) ? $this->wcproduct->set_stock_status("onbackorder") : $this->wcproduct->set_stock_status("instock");
        return $this->wcproduct;
    }
}
