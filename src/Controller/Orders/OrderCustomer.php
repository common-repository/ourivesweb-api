<?php

namespace OurivesWeb\Controller\Orders;

use OurivesWeb\Helper\Error;
use OurivesWeb\Helper\Log;
use OurivesWeb\Type\EditCliente;
use OurivesWeb\Type\GetClientesMail;
use OurivesWeb\Type\GetClientesNif;
use WC_customer;

class OrderCustomer
{
    /**
     * @var WC_customer
     */
    private $customer;

    private $customer_id = false;          //ID
    private $vat = '999999990';    //NIF
    private $email = '';             //Email
    private $name = 'Cliente';      //Nome
    private $contactName = '';             //Contacto
    private $zipCode = '1000-100';     //Codigo Postal
    private $address = 'Desconhecida'; //Endereço
    private $city = 'Desconhecida'; //Cidade
    private $languageId = 1;
    private $countryId = 1;


    /**
     * List of some invalid vat numbers
     * @var array
     */
    private $invalidVats = [
        '999999999',
        '000000000',
        '111111111'
    ];

    /**
     * Documents constructor.
     * @param WC_customer $customer
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return bool|int
     * @throws Error
     */
    public function create($Soap_Client)
    {


        $this->email = $this->customer->get_billing_email();

        $values['nome'] = trim($this->customer->get_billing_first_name()) . " " . trim($this->customer->get_billing_last_name());
        $values['morada'] = trim($this->customer->get_billing_address_1()) . " " . trim($this->customer->get_billing_address_2());
        $values['localidade'] = trim($this->customer->get_billing_city());
        $values['codPostal'] = trim($this->customer->get_billing_postcode());
        $values = $this->getCustomerCountryId($values);
        $values['telemovel'] = $this->customer->get_billing_phone();
        $values['email'] = $this->customer->get_billing_email();
        $values['meta_data'] = $this->customer->get_meta_data();
        $values['telefone'] = null;
        $values['fax'] = null;
        $values['contacto'] = trim($this->customer->get_billing_company());

        $this->vat = $this->getVatNumber();
        $this->vat = $this->SterilizeNif($this->vat);

        $ourivesweb_Customer_Exists = $this->searchForCustomer($Soap_Client);

        /**
         *  Se o cliente não existir no OurivesWeb, cria-o
         *          -> Retorna o ID do novo registo ( $values['customer_id'] = ID )
         */
        if (!$ourivesweb_Customer_Exists) {
            $values['vat'] = $this->vat;
            $values['customer_id'] = null;
            Log::write('A Criar novo utilizador com o Email: ' . $this->email . ' ||| Nif: ' . $this->vat);

            $result = $Soap_Client["Obj"]->EditCliente(new EditCliente($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], null, $values['nome'], $values['morada'], $values['localidade'], $values['codPostal'], $values['pais_iso'], $values['telefone'], $values['fax'], $values['telemovel'], $values['email'], $values['vat'], $values['contacto']));
            $values['customer_id'] = $result->getEditClienteResult();
        } /**
         * Se o Cliente já existir, atualiza-o
         */
        else {
            $values['customer_id'] = (int)$ourivesweb_Customer_Exists->cliente;
            $values['vat'] = $this->vat;

            if (($values['nome'] != $ourivesweb_Customer_Exists->nome) || ($this->vat != $ourivesweb_Customer_Exists->contribuin) || ($values['email'] != $ourivesweb_Customer_Exists->email)) {
                Log::write('A atualizar utilizador Id:' . (int)$ourivesweb_Customer_Exists->cliente . ' ||| Email: ' . $this->email . ' ||| Nif: ' . $this->vat);
                try {
                    $result = $Soap_Client["Obj"]->EditCliente(new EditCliente($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $values['customer_id'], $values['nome'], $values['morada'], $values['localidade'], $values['codPostal'], $values['pais_iso'], $values['telefone'], $values['fax'], $values['telemovel'], $values['email'], $values['vat'], $values['contacto']));
                } catch (Error $error) {
                    Log::write("Erro ao atualizar utilizador:" . $error);
                }
            }
        }
        if (isset($values['customer_id'])) {
            $this->customer_id = $values['customer_id'];
        } else {
            throw new Error('Atenção, houve um erro ao inserir o cliente.', 'error');
        }
        Log::write('Utilizador com ID:' . $values['customer_id'] . ' a ser utilizador para formação do novo documento.');

        return $this->customer_id;
    }

    /**
     * Get the country_id based on a ISO value
     */
    public function getCustomerCountryId($values)
    {
        global $wpdb;
        $country = $this->customer->get_billing_country();
        $value = $wpdb->get_row("SELECT * FROM OurivesWeberp_country_iso WHERE country = '" . $country . "' ");
        $values['pais_nome'] = $value->nome;
        $values['pais_mercado'] = $value->mercado;
        $values['pais_iso'] = $value->country;
        return $values;
    }

    /**
     * Get the vat number of an customer
     * Get it from a custom field
     * @return string
     */
    public function getVatNumber()
    {

        $vat = '999999990';

        if (defined('VAT_FIELD')) {
            $meta_name = sanitize_text_field(VAT_FIELD);
            $metaVat = trim($this->customer->get_meta($meta_name));
            if (!empty($metaVat)) {
                $vat = trim($this->customer->get_meta($meta_name));
            } else {
                $meta_name = substr($meta_name, 1);
                $vat = trim($this->customer->get_meta($meta_name));
            }
        }
        Log::write("Nif do Cliente: " . $vat . " ||| valor do campo:" . $meta_name . " ||| variavel do pluggin:" . sanitize_text_field(VAT_FIELD));

        $this->vat = $vat;
        return $this->vat;
    }

    public function SterilizeNif($nif)
    {
        if (str_contains($nif, 'PT')) {
            $nif = str_replace('PT', '', $nif);
        }
        return $nif;
    }

    public function searchForCustomer($Soap_Client, $forField = false)
    {
        Log::write('Procurar pelo utilizador - Email: ' . $this->email . ' ||||  NIF: ' . $this->vat);
        if ($this->ValidateNIF($this->vat)) {
            return $this->GetClienteByNIF($Soap_Client, $this->email);
        } else {
            return $this->GetClienteByEmail($Soap_Client, $this->email);
        }
        return false;
    }

    /**
     * Procura o Cliente por Nif, se o mesmo não for o '999999990'
     * Se for procura o cliente por email
     * Se ambas as resposta forem Negativas da return false, para poder adicionar este cliente ao OurivesWeb
     */

    public function ValidateNIF($nif)
    {
        if ($this->vat != '999999990' && $this->vat != null && $this->vat != '' && !empty($this->vat))
            return true;
        else return false;
    }

    private function GetClienteByNIF($Soap_Client, $email)
    {
        try {
            $searchResult = $Soap_Client["Obj"]->GetClientesNif(new GetClientesNif($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $this->vat));
            //Tenta procurar utilizar pelo nif, se o nif não contem letras deverá encontrar
            if (isset($searchResult->GetClientesNifResult) && ($searchResult->GetClientesNifResult) != "1") {
                $temp = $searchResult->getGetClientesNifResult();
                $xml = simplexml_load_string($temp);
                if (isset($xml["cliente"]['cliente'])) {
                    Log::write('Encontrado pelo NIF: ' . $this->vat);
                    return $result = $xml["cliente"];
                }
            } elseif (filter_var($this->vat, FILTER_SANITIZE_NUMBER_INT) != $this->vat) {
                //Tenta procurar utilizar pelo nif, tenta procurar e remove as letras do nif se existir
                $newVat = filter_var($this->vat, FILTER_SANITIZE_NUMBER_INT);
                $searchResult = $Soap_Client["Obj"]->GetClientesNif(new GetClientesNif($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $newVat));
                if (isset($searchResult->GetClientesNifResult) && ($searchResult->GetClientesNifResult) != "1") {
                    $temp = $searchResult->getGetClientesNifResult();
                    $xml = simplexml_load_string($temp);
                    if (isset($xml["cliente"]['cliente'])) {
                        Log::write('Encontrado pelo NIF: ' . $newVat);
                        return $result = $xml["cliente"];
                    }
                } else {
                    return $this->GetClienteByEmail($Soap_Client, $this->email);
                }
            } else {
                return $this->GetClienteByEmail($Soap_Client, $this->email);
            }
        } catch (Error $error) {
            Log::write("ERRO: " . $error);
            return false;
        }
        return false;
    }

    private function GetClienteByEmail($Soap_Client, $email)
    {
        if (empty($email))
            return false;
        try {
            $searchResult = $Soap_Client["Obj"]->GetClientesMail(new GetClientesMail($Soap_Client["access_data"][0], $Soap_Client["access_data"][1], $email));
            $temp = $searchResult->getGetClientesMailResult();
            if ($temp == "-1") {
                $result = false;
            } else {
                $xml = simplexml_load_string($temp);
                foreach ($xml->children() as $result) {
                    Log::write('Encontrado pelo Email');
                    return $result;
                }
            }
        } catch (Error $error) {
            return false;
        }
        return false;
    }
}
