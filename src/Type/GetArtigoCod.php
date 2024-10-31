<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetArtigoCod implements RequestInterface
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
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $codigo
     */
    public function __construct($empresa, $password, $codigo)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->codigo = $codigo;
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
     * @return GetArtigoCod
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
     * @return GetArtigoCod
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
     * @return GetArtigoCod
     */
    public function withCodigo($codigo)
    {
        $new = clone $this;
        $new->codigo = $codigo;

        return $new;
    }


}

