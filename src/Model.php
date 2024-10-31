<?php

namespace OurivesWeb;

class Model
{

    //Return the row of plugin_api table with all the session details

    public static function setOption($option, $value)
    {
        global $wpdb;
        $setting = $wpdb->get_row($wpdb->prepare("SELECT * FROM OurivesWeb_api_config WHERE config = %s", $option), ARRAY_A);

        if (!empty($setting)) {
            $wpdb->update('OurivesWeb_api_config', ['selected' => $value], ['config' => $option]);
        } else {
            $wpdb->insert('OurivesWeb_api_config', ['selected' => $value, 'config' => $option]);
        }

        return $wpdb->insert_id;
    }


    //Check if a setting exists on database and update it or create it

    /**
     * Define constants from database
     */
    public static function defineValues()
    {
        global $wpdb;
        $tokensRow = self::getTokensRow();
        if (!empty($tokensRow)) {
            if(!defined('OURIVESWEB_ACCESS_TOKEN')) {
                define('OURIVESWEB_ACCESS_TOKEN', $tokensRow['main_token']);
            }
            $wpdb->update('OurivesWeb_api_config', ['selected' => $tokensRow["main_token"]], ['config' => "OURIVESWEB_ACCESS_TOKEN"]);
            return true;
        } else {
            return false;
        }
    }

    public static function getTokensRow()
    {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM OurivesWeb_api ORDER BY id DESC", ARRAY_A);
    }

    /**
     * Define company selected settings
     */
    public static function defineConfigs()
    {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM OurivesWeb_api_config ORDER BY id DESC", ARRAY_A);
        foreach ($results as $result) {
            $setting = strtoupper($result['config']);
            if (!defined($setting)) {
                if ($setting == "on")
                    $setting = 1;

                define($setting, $result['selected']);
            }
        }

        if (defined('OURIVESWEB_ACCESS_TOKEN') && OURIVESWEB_ACCESS_TOKEN == NULL)
            return false;
        else
            return true;
    }

    /**
     * Get all available custom fields
     * @return array
     */
    public static function getCustomFields()
    {
        global $wpdb;

        $results = $wpdb->get_results("SELECT DISTINCT meta_key FROM " . $wpdb->prefix . "postmeta ORDER BY `" . $wpdb->prefix . "postmeta`.`meta_key` ASC", ARRAY_A);

        $customFields = [];
        if ($results && is_array($results)) {
            foreach ($results as $result) {
                $customFields[] = $result;
            }
        }
        return $customFields;
    }
}
