<?php

namespace OurivesWeb\Controller;

use OurivesWeb\Helper\Tokens;
use OurivesWeb\OurivesWebClientFactory;
use OurivesWeb\Type\GetArtigos;
use PDOException;

class Connection
{
    public $conexao;


    /**
     * 2 Possibilidades:
     *       Possivel apenas receber dados de Empressa e Password armazenados na DB Local.
     *       Possivel receber xml com os dados finais se este apenas exigir os dados de Empressa e Password
     * @param string $SenderProtocol Protocolo de envio
     * @param string $receiverProtocol Protocolo para visualizar resposta
     * @param string $wsdl Estatico (servioço WSDL)
     * @return string repsosta do servidor
     */
    public static function Soap_Client($SenderProtocol, $receiverProtocol, $wsdl = "https://apiourives.ponto25.com/apiourives.asmx?WSDL")
    {
        try {
            $Soap_Client = OurivesWebClientFactory::factory($wsdl);
            $temp = Tokens::GetUserAndPass();
            if ($SenderProtocol == NULL || $receiverProtocol == NULL) {
                $temp2["Obj"] = $Soap_Client;
                $temp2["access_data"][0] = $temp[0];
                $temp2["access_data"][1] = $temp[1];
                return $temp2;
            }
            $response = $Soap_Client->$SenderProtocol(new GetArtigos($temp[0], $temp[1]));
            $temp = $response->$receiverProtocol();
            return $temp;

        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
            die;
        }
    }
}