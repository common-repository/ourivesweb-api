<?php

namespace OurivesWeb;

use OurivesWeb\Activators\Admin;
use OurivesWeb\Controller\Connection;
use OurivesWeb\Controller\Orders\Documents;
use OurivesWeb\Controller\Products\Product;
use OurivesWeb\Helper\Cat_meta_data;
use OurivesWeb\Helper\Error;
use OurivesWeb\Helper\Log;
use OurivesWeb\Helper\SweetAlert;
use WC_Tax;


class Plugin
{

    public function __construct()
    {
        new Admin($this);
        Cat_meta_data::run();
        $this->crons();
        $this->update();
    }

    public function run()
    {


        try {
            /** If the user is not logged in show the login form */
            if (Start::login()) {
                $this->crons();
                $action = isset($_REQUEST['action']) ? sanitize_text_field(trim($_REQUEST['action'])) : '';
                $Soap_Client = Connection::Soap_Client(null, null);
                switch ($action) {
                    case 'remInvoice':
                        $this->removeOrder(sanitize_text_field(trim((int)$_GET['id'])));
                        break;

                    case 'genInvoice':
                        $orderId = isset($_REQUEST['id']) ? (int)sanitize_text_field(trim($_REQUEST['id'])) : '';
                        $document = $this->createDocument($Soap_Client, $orderId);
                        break;

                    case 'syncStocks':
                        Log::write('Iniciando uma Sincronização');
                        SweetAlert::AnimatedNotifyPDF("success", "Ver relatorio", OURIVES_URL . 'logs/' . ((new Product())->Update_OurivesWeb_ToWC()));

                        break;

                    case 'Cat_SubCat':
                        (new Cat_meta_data())->Add_All_Categories();
                        SweetAlert::AnimatedNotify_Simple("success", "Familias e Sub Familias adicionadas com sucesso!");

                        break;

                    case 'remLogs':
                        Log::removeLogs();
                        add_settings_error('OurivesWeb', 'OurivesWeb-rem-logs', 'A limpeza de logs foi concluída.', 'updated');
                        break;

                    case 'getInvoice':
                        $document = false;
                        $documentId = isset($_REQUEST['id']) ? sanitize_text_field(trim($_REQUEST['id'])) : '';

                        if (!empty($documentId)) {
                            $document = Documents::showDocument($Soap_Client, $documentId, "Documento gerado!", "success");
                        }
                        break;

                    case 'Taxes':

                        $tax = new WC_Tax();

                        $IVA = array(23, 13, 6);
                        foreach ($IVA as $iva) {
                            $name = "OurivesWeb IVA" . $iva;
                            $tax->create_tax_class($name);
                            $tax_rate = array(
                                'tax_rate_country' => 'PT',
                                'tax_rate_state' => '',
                                'tax_rate' => $iva,
                                'tax_rate_name' => "IVA " . $iva . "%",
                                'tax_rate_priority' => 1,
                                'tax_rate_compound' => 0,
                                'tax_rate_shipping' => 1,
                                'tax_rate_order' => 1,
                                'tax_rate_class' => 'OurivesWeb IVA' . $iva
                            );
                            $tax->_insert_tax_rate($tax_rate);

                            SweetAlert::AnimatedNotify_Simple("success", "Taxas Adicionadas com sucesso!");
                        }
                        break;
                }


                if (!wp_doing_ajax()) {
                    $array = array('settings', 'report');
                    if (isset($_GET['tab'])) {
                        $tab = sanitize_text_field(trim($_GET['tab']));
                        if ($tab == null) {
                            wp_enqueue_style('Style_modal', plugins_url('assets/css/Main.css', OURIVES_FILE));
                            require_once OURIVES_TEMPLATE_DIR . 'MainContainer.php';
                        } elseif (in_array($tab, $array)) {
                            wp_enqueue_style('Style_modal', plugins_url('assets/css/' . $tab . '.css', OURIVES_FILE));
                            require_once OURIVES_TEMPLATE_DIR . $tab . '.php';
                        } else {
                            wp_enqueue_style('Style_modal', plugins_url('assets/css/Error.css', OURIVES_FILE));
                            throw new Error('You Shall Not Pass!', 'error');
                        }
                    } else {
                        wp_enqueue_style('Style_modal', plugins_url('assets/css/Main.css', OURIVES_FILE));
                        require_once OURIVES_TEMPLATE_DIR . 'MainContainer.php';
                    }
                }
            }
        } catch (Error $error) {
            $error->showError();
        }
    }

    public static function defines()
    {

        if (isset($_REQUEST['page']) && sanitize_text_field($_REQUEST['page']) == 'OurivesWeb') {
            //Wordpress EnQueue Styles
            wp_enqueue_style('Bootstrap', plugins_url('assets/Includes/bootstrap.min.css', OURIVES_FILE));
            //Wordpress EnQueue JavaScripts
            wp_enqueue_script('Bootstrap.min.js', plugins_url('assets/Includes/bootstrap.min.js', OURIVES_FILE));
            wp_enqueue_script('bootstrap.bundle.min.js', plugins_url('assets/Includes/bootstrap.bundle.min.js', OURIVES_FILE));
        }
    }

    public static function productUpdated($product_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        remove_action("woocommerce_update_product", __CLASS__ . "::productUpdated");
        update_post_meta(intval($product_id), "date_modified", strtotime("now"));

        add_action('woocommerce_update_product', __CLASS__ . "::productUpdated");
        return TRUE;
    }

    public static function autoDoc($order_id, $old_status, $new_status)
    {
        if ($new_status == "processing") {
            Model::defineConfigs();
            if (defined("DOC_AUTO") && DOC_AUTO) {
                $document = new Documents((int)$order_id);
                $document->createDocument();
            }
        }
    }

    public static function syncProductCron()
    {
        Log::write('Iniciando Sincronização Automática');
        Model::defineConfigs();
        (new Product())->Update_OurivesWeb_ToWC();
    }

    private function crons()
    {
        global $wpdb;
        remove_action("woocommerce_update_product", __CLASS__ . '::productUpdated');
        add_action('woocommerce_update_product', __CLASS__ . '::productUpdated');

        add_action('ourivesweb_woocommerce_products_sync', '\OurivesWeb\Plugin::syncProductCron');
        $ourivesweb_stock_sync = absint($wpdb->get_var("SELECT selected FROM OurivesWeb_api_config WHERE config = 'ourivesweb_stock_sync'"));
        $next_exec = time() + (absint($wpdb->get_var("SELECT selected FROM OurivesWeb_api_config WHERE config = 'ourivesweb_stock_sync_time'")) ?: 1000);
        if ($ourivesweb_stock_sync && !wp_next_scheduled('ourivesweb_woocommerce_products_sync')) {
            wp_schedule_single_event($next_exec, 'ourivesweb_woocommerce_products_sync');
            Log::write('Finalizando Sincronização Automática');
            Log::write(sprintf('Próxima sincronização agendada para %s', date('Y-m-d H:i:s', $next_exec)));
        }
        add_action('woocommerce_order_status_changed', '\OurivesWeb\Plugin::autoDoc', 10, 3);
    }

    private function removeOrder($orderId)
    {
        $document = new Documents($orderId);
        $document->RemoveDocument();
    }

    private function createDocument($Soap_Client, $orderId)
    {
        $document = new Documents($orderId);
        $document->createDocument();

        if ($document->document_id) {
            $document = Documents::showDocument($Soap_Client, $orderId, "Documento gerado!", "success");
            $viewUrl = ' <a href="' . admin_url('admin.php?page=OurivesWeb&action=getInvoice&id=' . $document->document_id) . '" target="_BLANK">Ver documento</a>';
            add_settings_error('OurivesWeb', 'OurivesWeb-document-created-success', 'O documento foi gerado!' . $viewUrl, 'updated');
        }

        return $document;
    }

    private function update()
    {
        if (OURIVES_VERSION === '1.1.1') {
            global $wpdb;
            $wpdb->query("UPDATE OurivesWeb_api_config SET config='ourivesweb_stock_sync' WHERE config = 'Ourives_stock_sync'");
            $wpdb->query("UPDATE OurivesWeb_api_config SET config='ourivesweb_stock_sync_time' WHERE config = 'Ourives_stock_sync_time'");
        }
    }

}
