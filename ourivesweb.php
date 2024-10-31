<?php 
/**
 * Plugin Name:       OurivesWeb Api
 * Plugin URI:        https://wordpress.org/plugins/OurivesWeb-api/
 * Description:       Integração do OurivesWeb com o WooCommerce.
 * Version:           1.1.1
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            Ponto25
 * Author URI:        https://www.ponto25.com/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

require_once  __DIR__ . '/vendor/autoload.php';


if (!defined('ABSPATH')) {
    exit;
}

if (!defined('OURIVES_VERSION')) {
    define('OURIVES_VERSION', '1.1.1');
}

if (!defined('OURIVES_DIR')) {
    define('OURIVES_DIR', __DIR__);
}

if (!defined('OURIVES_FILE')) {
    define('OURIVES_FILE', __FILE__);
}

if (!defined('OURIVES_URL')) {
    define('OURIVES_URL', plugin_dir_url(__FILE__));
}

if (!defined('OURIVES_IMAGES_URL')) {
    define('OURIVES_IMAGES_URL', plugin_dir_url(__FILE__) . 'assets/img/');
}

if (!defined('OURIVES_TEMP_FILES')) {
    define('OURIVES_TEMP_FILES', __DIR__ . '/logs/');
}

if (!defined('OURIVES_TEMPLATE_DIR')) {
    define('OURIVES_TEMPLATE_DIR', __DIR__ . '/src/Views/');
}
if (!defined('OURIVES_DIVIDER')) {
    define('OURIVES_DIVIDER','--------------------------------------------------------------------------------------');
}



register_activation_hook(__FILE__, 'OurivesWeb\Activators\Install::run');
register_deactivation_hook(__FILE__, 'OurivesWeb\Activators\Remove::run');

add_action('plugins_loaded', 'Start');

add_action('admin_enqueue_scripts', '\OurivesWeb\Plugin::defines');

function Start()
{
    return new \OurivesWeb\Plugin();
}

