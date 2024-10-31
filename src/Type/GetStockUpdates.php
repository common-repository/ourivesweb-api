<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetStockUpdates implements RequestInterface
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
    private $dias = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $dias
     */
    public function __construct($empresa, $password, $dias)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->dias = $dias;
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
     * @return GetStockUpdates
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
     * @return GetStockUpdates
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
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * @param string $dias
     * @return GetStockUpdates
     */
    public function withDias($dias)
    {
        $new = clone $this;
        $new->dias = $dias;

        return $new;
    }


}

