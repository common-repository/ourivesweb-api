<?php

namespace OurivesWeb\Activators;

class Remove
{
    public static function run()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE OurivesWeb_api");
        $wpdb->query("DROP TABLE OurivesWeb_api_config");
        $wpdb->query("DROP TABLE OurivesWeb_api_Empresa");
        $wpdb->query("DROP TABLE OurivesWeb_Country_ISO");
        wp_clear_scheduled_hook('woocommerce_update_product');
        wp_clear_scheduled_hook('woocommerce_Sync_product');
    }

}