<?php

namespace OurivesWeb\Helper;

use Exception;
use OurivesWeb\Controller\Connection;
use OurivesWeb\Type\GetEmpresa;
use OurivesWeb\Type\GetPaises;

class Tokens
{
    public static function registerLocal($username, $password)
    {
        global $wpdb;
        try {
            $Token = self::generateToken();
            $query = $wpdb->prepare("INSERT INTO OurivesWeb_api (main_token,client_username,client_password) values (%s,%s,%s)", $Token, ($username), ($password));
            $OurivesWeb_api = $wpdb->query($query);

            $Soap_Client = Connection::Soap_Client(NULL, NULL);

            $response = $Soap_Client["Obj"]->GetEmpresa(new GetEmpresa($username, $password));
            $temp = $response->getGetEmpresaResult();
            $xml = simplexml_load_string($temp) or die("Error: Cannot create object");

            $values = [];
            isset($xml->Empresa->nome) ? $Values['Nome'] = trim($xml->Empresa->nome) : $Values['Nome'] = "";
            isset($xml->Empresa->morada) ? $Values['morada'] = trim($xml->Empresa->morada) : $Values['morada'] = "";
            isset($xml->Empresa->cod_postal) ? $Values['cod_postal'] = trim($xml->Empresa->cod_postal) : $Values['cod_postal'] = "";
            isset($xml->Empresa->telefones) ? $Values['telefones'] = trim($xml->Empresa->telefones) : $Values['telefones'] = "";
            isset($xml->Empresa->contribuinte) ? $Values['contribuinte'] = trim($xml->Empresa->contribuinte) : $Values['contribuinte'] = "";
            isset($xml->Empresa->pais) ? $Values['pais'] = trim($xml->Empresa->pais) : $Values['pais'] = "";
            isset($xml->Empresa->logotipo) ? $Values['img'] = base64_encode($xml->Empresa->logotipo) : $Values['img'] = "";

            $query2 = $wpdb->prepare("INSERT INTO OurivesWeb_api_Empresa ( main_token,nome,morada,cod_postal,telefones,nif,pais,img) values (%s,%s,%s,%s,%s,%s,%s,%s)",
                $Token, $Values['Nome'], $Values['morada'], $Values['cod_postal'], $Values['telefones'], $Values['contribuinte'], $Values['pais'], $Values['img']);
            $OurivesWeb_api_Empresa = $wpdb->query($query2);


            $response = $Soap_Client["Obj"]->GetPaises(new GetPaises ($username, $password));
            $temp = $response->getGetPaisesResult();
            $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
            foreach ($xml->children() as $Country) {
                $wpdb->query("INSERT INTO `OurivesWeb_Country_ISO`(country, nome,mercado) VALUES('" . $Country->pais . "','" . $Country->nome . "','" . $Country->mercado . "')");
            }


            return $OurivesWeb_api;
        } catch (Exception $error) {
            self::LogoutToken();
            return FALSE;
        }


    }

    public static function generateToken()
    {

        return (sha1(mt_rand(1, 90000)) . '_Ponto25');

    }

    public static function LogoutToken()
    {
        global $wpdb;
        $wpdb->query("TRUNCATE OurivesWeb_api");
        $wpdb->query("TRUNCATE OurivesWeb_api_Empresa");
        $wpdb->query("TRUNCATE OurivesWeb_Country_ISO");
        $wpdb->update('OurivesWeb_api_config', ['selected' => null], ['config' => "OURIVESWEB_ACCESS_TOKEN"]);
        return true;
    }

    public static function GetUserAndPass()
    {

        global $wpdb;
        try {
            if (defined('OURIVESWEB_ACCESS_TOKEN')) {
                $query = $wpdb->prepare("SELECT client_username,client_password FROM OurivesWeb_api WHERE main_token = %s", OURIVESWEB_ACCESS_TOKEN);
            } else {
                $results = $wpdb->get_results("SELECT client_username,client_password FROM OurivesWeb_api");
                $temp[0] = $results[0]->client_username;
                $temp[1] = $results[0]->client_password;
                return $temp;
            }
            $results = $wpdb->get_results($query, ARRAY_N);


            if (empty($results[0][0])) return FALSE;
            else return $results[0];

        } catch (Exception $error) {
            die($error->getMessage());
        }


    }


}