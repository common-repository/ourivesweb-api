<?php

namespace OurivesWeb;

use OurivesWeb\Helper\SweetAlert;
use OurivesWeb\Helper\Tokens;
use OurivesWeb\Type\ValidaLogin;

class Start
{

    private static $ajax = false;

    public static function login($ajax = false)
    {

        global $wpdb;
        if ($ajax) {
            self::$ajax = true;
        }

        $action = isset($_REQUEST['action']) ? sanitize_text_field(trim($_REQUEST['action'])) : '';
        $username = isset($_POST['user']) ? sanitize_user(trim($_POST['user'])) : '';
        $password = isset($_POST['pass']) ? stripslashes(sanitize_text_field(trim($_POST['pass']))) : '';


        if (!empty($username) && !empty($password)) {


            $wsdl = 'https://apiourives.ponto25.com/apiourives.asmx?WSDL';
            $Soap_Client = OurivesWebClientFactory::factory($wsdl);
            $response = $Soap_Client->ValidaLogin(new ValidaLogin($username, $password));
            $login = $response->getValidaLoginResult();
            if ($login == 1) {

                self::loginConfirmation($username, $password);
                SweetAlert::AnimatedNotify("success", "Log In efetuado");
                Model::defineValues();
                Model::defineConfigs();
                return true;
            } else {
                SweetAlert::AnimatedNotify("warning", "Combinação de utilizador/password errados");
                self::loginForm('Combinação de utilizador/password errados');
                return false;
            }

        }

        if ($action === 'logout') {
            SweetAlert::AnimatedNotify("success", "Logout efetuado");
            Tokens::LogoutToken();
            self::loginForm();
            return false;

        }

        if ($action === 'save') {
            SweetAlert::AnimatedNotify("success", "Configurações aleradas com sucesso!");
            $options = isset($_POST['opt']) ? (array)self::recursive_sanitize_text_field($_POST['opt']) : array();

            foreach ($options as $option => $value) {
                $option = sanitize_text_field($option);
                $value = sanitize_text_field($value);

                Model::setOption($option, $value);
            }
        }
        if (Model::defineConfigs()) {
            return true;
        }
        self::loginForm('Bem Vindo');
        return false;
    }

    public static function loginConfirmation($username = null, $password = null)
    {
        global $wpdb;
        $tokensRow = $wpdb->get_row("SELECT * FROM OurivesWeb_api ORDER BY id DESC", ARRAY_A);

        if (($tokensRow) == FALSE) {
            return self::RegistaLocalmente($username, $password);
        } else {
            return define("OURIVESWEB_ACCESS_TOKEN", $tokensRow['main_token']);
        }


    }

    public static function RegistaLocalmente($username, $password)
    {


        Tokens::registerLocal($username, $password);
        return self::loginConfirmation($username, $password);
    }

    /**
     * Shows a login form
     * @param bool|string $error Is used in include
     */
    public static function loginForm($error = false)
    {
        if (!self::$ajax) {
            wp_enqueue_style('Style_modal', plugins_url('assets/css/Login.css', OURIVES_FILE));
            include(OURIVES_TEMPLATE_DIR . 'LoginForm.php');
        }
    }

    public static function recursive_sanitize_text_field($array)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = self::recursive_sanitize_text_field($value);
            } else {
                $value = sanitize_text_field($value);
            }
        }

        return $array;
    }


}
