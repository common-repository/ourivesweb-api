<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetClientesNif implements RequestInterface
{

    /**
     * @var string
     */
    private $empresa = null;

    /**
     * @var string
     */
    private $password = null;

    /**
     * @var string
     */
    private $nif = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $nif
     */
    public function __construct($empresa, $password, $nif)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->nif = $nif;
    }

    /**
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param string $empresa
     * @return GetClientesNif
     */
    public function withEmpresa($empresa)
    {
        $new = clone $this;
        $new->empresa = $empresa;

        return $new;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return GetClientesNif
     */
    public function withPassword($password)
    {
        $new = clone $this;
        $new->password = $password;

        return $new;
    }

    /**
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param string $nif
     * @return GetClientesNif
     */
    public function withNif($nif)
    {
        $new = clone $this;
        $new->nif = $nif;

        return $new;
    }


}

