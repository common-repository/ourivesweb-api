<?php

namespace OurivesWeb\Helper;

use OurivesWeb\Controller\Connection;
use OurivesWeb\Start;
use OurivesWeb\Type\GetFamilias;
use OurivesWeb\Type\GetSubFamilias;


class Cat_meta_data
{
    public function __construct()
    {
        return $this;
    }

    public static function run()
    {
        add_action('product_cat_edit_form_fields', __CLASS__ . "::custom_product_taxonomy_edit_meta_field", 10, 2);
        add_action('product_cat_add_form_fields', __CLASS__ . "::custom_product_taxonomy_add_new_meta_field", 10, 2);
        add_action('edited_product_cat', __CLASS__ . "::save_taxonomy_custom_meta", 10, 2);
        add_action('create_product_cat', __CLASS__ . "::save_taxonomy_custom_meta", 10, 2);
    }


    // Add term page

    public static function Calculator_Categoria($Soap_Client, $id_Familia)
    {
        remove_action('edited_product_cat', __CLASS__ . "::save_taxonomy_custom_meta", 10, 2);
        remove_action('create_product_cat', __CLASS__ . "::save_taxonomy_custom_meta", 10, 2);

        $time = time();
        global $wpdb;
        if ($id_Familia == 0) {
            return NULL;
        }
        $order_ids = $wpdb->get_col("SELECT `option_name` FROM `wp_options` WHERE `option_value` LIKE '%custom_p25_cat_id%%$id_Familia%' ");
        if (!empty($order_ids)) {
            return (int)(explode('_', $order_ids[0]))[1];
        }
        //Procura no WooCommerce se a familia já existe.
        if ($order_ids == NULL) {
            $response = $Soap_Client["Obj"]->GetFamilias(new GetFamilias($Soap_Client["access_data"][0], $Soap_Client["access_data"][1]));
            $temp = $response->getGetFamiliasResult();
            $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
            //$xml detem todas as familias criadas no OurivesWeb.Estas são iteradas até que encontre o ID da familia esperado.
            foreach ($xml as $familia) {
                if (($familia->família) == $id_Familia) {
                    if ($term = get_term_by('name', trim(strval($familia->descrição)), 'product_cat')) {
                        return $term->term_id;
                    }
                    $id = wp_insert_term(trim(strval($familia->descrição)), 'product_cat', array('description' => 'Description for category', 'parent' => 0));
                    if (is_wp_error($id)) {
                        Log::write("Ao importar SubCategoria um erro foi encontrado,  " . $familia->asXML());
                        continue;
                    }
                    $term_meta["custom_p25_cat_id"] = intval($familia->família);
                    update_option("taxonomy_" . $id['term_id'], $term_meta);
                    return $id["term_id"];
                }
            }
        }
    }

    // Edit term page

    public static function Calculator_Sub_Categoria($Soap_Client, $id_subFamilia)
    {
        try {

            global $wpdb;
            if ($id_subFamilia == "sub0") {
                return NULL;
            }
            $order_ids = $wpdb->get_col("SELECT `option_name` FROM `wp_options` WHERE `option_value` LIKE '%custom_p25_cat_id%%$id_subFamilia%' ");
            if (!empty($order_ids)) {
                return (int)(explode('_', $order_ids[0]))[1];
            }


            //Procura no WooCommerce se a familia já existe.
            if ($order_ids == NULL) {
                $response = $Soap_Client["Obj"]->GetSubFamilias(new GetSubFamilias($Soap_Client["access_data"][0], $Soap_Client["access_data"][1]));
                $temp = $response->getGetSubFamiliasResult();
                $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
                //$xml detem todas as familias criadas no OurivesWeb.Estas são iteradas até que encontre o ID da familia esperado.
                foreach ($xml as $subfamília) {
                    if (($subfamília->subfamília) == str_replace('sub', "", $id_subFamilia)) {
                        if ($term = get_term_by('name', trim(strval($subfamília->descrição)), 'product_cat')) {
                            return $term->term_id;
                        }
                        $id = wp_insert_term(trim(strval($subfamília->descrição)), 'product_cat', array('description' => 'Description for Sub Category', 'parent' => 0));
                        if (is_wp_error($id)) {
                            Log::write("Ao importar SubCategoria um erro foi encontrado,  " . $subfamília->asXML());
                            continue;
                        }
                        $term_meta["custom_p25_cat_id"] = $id_subFamilia;
                        update_option("taxonomy_" . $id['term_id'], $term_meta);
                        return $id["term_id"];
                    }
                }
            }
        } catch (Error $error) {
            $error->showError();
        }
    }


    // Save extra taxonomy fields callback function.

    public static function Add_All_Categories()
    {
        try {
            $Soap_Client = Connection::Soap_Client(NULL, NULL);
            $response = $Soap_Client["Obj"]->GetFamilias(new GetFamilias($Soap_Client["access_data"][0], $Soap_Client["access_data"][1]));
            $temp = $response->getGetFamiliasResult();
            $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
            foreach ($xml as $familia) {
                if ($term = get_term_by('name', trim(strval($familia->descrição)), 'product_cat')) {
                    continue;
                } else {
                    $id = wp_insert_term(trim(strval($familia->descrição)), 'product_cat', array('description' => 'Description for category', 'parent' => 0));
                    $term_meta["custom_p25_cat_id"] = intval($familia->família);
                    update_option("taxonomy_" . $id['term_id'], $term_meta);
                }
            }

            $response = $Soap_Client["Obj"]->GetSubFamilias(new GetSubFamilias($Soap_Client["access_data"][0], $Soap_Client["access_data"][1]));
            $temp = $response->getGetSubFamiliasResult();
            $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
            //$xml detem todas as familias criadas no OurivesWeb.Estas são iteradas até que encontre o ID da familia esperado.
            foreach ($xml as $subfamília) {
                if ($term = get_term_by('name', trim(strval($subfamília->descrição)), 'product_cat')) {
                    continue;
                }
                $id = wp_insert_term(trim(strval($subfamília->descrição)), 'product_cat', array('description' => 'Description for Sub Category', 'parent' => 0));
                if (is_wp_error($id)) {
                    Log::write("Ao importar SubCategoria um erro foi encontrado,  " . $subfamília->asXML());
                    continue;
                }
                $term_meta["custom_p25_cat_id"] = intval($subfamília->família);
                update_option("taxonomy_" . $id['term_id'], $term_meta);
            }
        } catch (Error $error) {
            $error->showError();
        }
    }

    public static function custom_product_taxonomy_add_new_meta_field()
    {
        // this will add the custom meta field to the add new term page
        ?>
        <div class="form-field">
            <label for="term_meta[custom_p25_cat_id]"><?php _e('Categoria Ourives ID', 'my-text-domain'); ?></label>
            <input type="text" name="term_meta[custom_p25_cat_id]" id="term_meta[custom_p25_cat_id]" value="">
            <p class="description"><?php _e('ID da categoria no OurivesWeb ', 'my-text-domain'); ?></p>
        </div>

        <?php
    }

    public static function custom_product_taxonomy_edit_meta_field($term)
    {

        // put the term ID into a variable
        $t_id = $term->term_id;

        // retrieve the existing value(s) for this meta field. This returns an array
        $term_meta = get_option("taxonomy_$t_id"); ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label
                        for="term_meta[custom_p25_cat_id]"><?php _e('Categoria Ourives ID', 'my-text-domain'); ?></label>
            </th>
            <td>
                <input type="text" name="term_meta[custom_p25_cat_id]" id="term_meta[custom_p25_cat_id]"
                       value="<?php esc_attr($term_meta['custom_p25_cat_id']) ? print(esc_attr($term_meta['custom_p25_cat_id'])) : ''; ?>">
                <p class="description"><?php _e('Enter a value for this field', 'my-text-domain'); ?></p>
            </td>
        </tr>
        <?php
    }

    public static function save_taxonomy_custom_meta($term_id)
    {
        if (isset($_POST['term_meta'])) {
            $t_id = $term_id;
            $term_meta = get_option("taxonomy_$t_id");
            $cat_keys = array_keys(Start::recursive_sanitize_text_field($_POST['term_meta']));
            foreach ($cat_keys as $key) {
                if (isset($_POST['term_meta'][$key])) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            update_option("taxonomy_$term_id", $term_meta);
        }
    }
}
