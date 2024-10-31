<?php

namespace OurivesWeb\Activators;

class Install
{
    /**
     * Run the installation process
     * Install API Connection table
     * Install Settings table
     * Start sync crons
     */
    public static function run()
    {

        if (!class_exists('WooCommerce')) {
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die(esc_htmlecho('Requires WooCommerce 3.0.0 or above.', 'OurivesWeb-pt'));
        }

        self::createTables();
        self::insertSettings();
    }

    /**
     * Create API connection table
     */
    private static function createTables()
    {
        global $wpdb;
        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS `OurivesWeb_api`( 
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                main_token VARCHAR(100), 
                client_username VARCHAR(100), 
                client_password VARCHAR(100), 
                dated TIMESTAMP default CURRENT_TIMESTAMP
            ) ENGINE=InnoDB   DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;"
        );


        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS `OurivesWeb_api_Empresa`( 
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                main_token VARCHAR(100), 
                nome VARCHAR(100), 
                morada VARCHAR(100), 
                cod_postal VARCHAR(100), 
                telefones VARCHAR(100), 
                nif VARCHAR(100), 
                capital VARCHAR(100), 
                pais VARCHAR(100), 
                img LONGBLOB, 
                dated TIMESTAMP default CURRENT_TIMESTAMP
            ) ENGINE=InnoDB   DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;"
        );

        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS `OurivesWeb_api_config`( 
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                config VARCHAR(100), 
                description VARCHAR(100), 
                selected VARCHAR(100), 
                changed TIMESTAMP default CURRENT_TIMESTAMP
			) ENGINE=InnoDB   DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;"
        );

        $wpdb->query(
            "CREATE TABLE IF NOT EXISTS `OurivesWeb_Country_ISO`( 
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                country VARCHAR(100), 
                nome VARCHAR(100), 
                mercado VARCHAR(100), 
                changed TIMESTAMP default CURRENT_TIMESTAMP
			) ENGINE=InnoDB   DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;"
        );


    }

    /**
     * Create Local OurivesWeb account settings
     */

    private static function insertSettings()
    {
        global $wpdb;

        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description) VALUES('document_set_id', 'Escolha uma Série de Documentos para melhor organização')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description) VALUES('document_status', 'Escolha o estado do documento (fechado ou em rascunho)')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description) VALUES('document_type', 'Escolha o tipo de documentos que deseja emitir')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description) VALUES('vat_field', 'Número de contribuinte')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('ourivesweb_stock_sync', 'Sincronizar Stocks','0')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('ourivesweb_stock_sync_time', 'Tempo de sincronização automatica dos stocks','21600')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description) VALUES('OURIVESWEB_ACCESS_TOKEN', 'Token criado no login do utilizador')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_STATUS', 'Artigos sincronizados são guardados como Rascunho ou publicados','1')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('DOC_AUTO', 'Gerar Documentos automaticamente','0')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('PVP_PRICE', 'Tipo de PVP para o preço do produto','pvp1')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('PVP_SALE', 'Tipo de PVP para o preço em promoçãodo produto','pvp2')");

        //which Camp will be Updated

        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_DESC',       'Field:DESC',      '1')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_WEIGHT',     'Field:WEIGHT',    '1')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_CUSTOPDR',   'Field:CUSTOPDR',  '1')");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_IMAGEM',     'Field:IMAGEM',    '1')");

        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_FAMILIA',    'Field:FAMILIA',     '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_SUBFAMILIA', 'Field:SUBFAMILIA',  '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_MATERIA',    'Field:MATERIA',     '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_SUBMATERIA', 'Field:SUBMATERIA',  '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_TOQUE',      'Field:TOQUE',       '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_MARCA',      'Field:MARCA',       '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_COLECAO',    'Field:COLECAO',     '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_GENERO',     'Field:GENERO',      '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_TEMA',       'Field:TEMA',        '1' )");
        $wpdb->query("INSERT INTO `OurivesWeb_api_config`(config, description,selected) VALUES('IMPORT_ORIGEM',     'Field:ORIGEM',      '1' )");
    }

    /**
     * Create Local OurivesWeb account Country Codes
     */
}
