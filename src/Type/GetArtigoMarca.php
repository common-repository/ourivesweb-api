<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetArtigoMarca implements RequestInterface
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
    private $marca = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $marca
     */
    public function __construct($empresa, $password, $marca)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->marca = $marca;
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
     * @return GetArtigoMarca
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
     * @return GetArtigoMarca
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
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     * @return GetArtigoMarca
     */
    public function withMarca($marca)
    {
        $new = clone $this;
        $new->marca = $marca;

        return $new;
    }


}

