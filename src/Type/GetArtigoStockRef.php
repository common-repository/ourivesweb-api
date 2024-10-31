<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetArtigoStockRef implements RequestInterface
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
    private $referencia = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $referencia
     */
    public function __construct($empresa, $password, $referencia)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->referencia = $referencia;
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
     * @return GetArtigoStockRef
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
     * @return GetArtigoStockRef
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
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param string $referencia
     * @return GetArtigoStockRef
     */
    public function withReferencia($referencia)
    {
        $new = clone $this;
        $new->referencia = $referencia;

        return $new;
    }


}

