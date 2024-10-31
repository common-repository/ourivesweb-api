<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetArtigosImageList implements RequestInterface
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
    private $codigo = null;

    /**
     * @var string
     */
    private $referencia = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $codigo
     * @var string $referencia
     */
    public function __construct($empresa, $password, $codigo, $referencia)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->codigo = $codigo;
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
     * @return GetArtigosImageList
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
     * @return GetArtigosImageList
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
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return GetArtigosImageList
     */
    public function withCodigo($codigo)
    {
        $new = clone $this;
        $new->codigo = $codigo;

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
     * @return GetArtigosImageList
     */
    public function withReferencia($referencia)
    {
        $new = clone $this;
        $new->referencia = $referencia;

        return $new;
    }


}

