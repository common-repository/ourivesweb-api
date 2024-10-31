<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetArtigoFamSfa implements RequestInterface
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
    private $familia = null;

    /**
     * @var string
     */
    private $subfamilia = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $familia
     * @var string $subfamilia
     */
    public function __construct($empresa, $password, $familia, $subfamilia)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->familia = $familia;
        $this->subfamilia = $subfamilia;
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
     * @return GetArtigoFamSfa
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
     * @return GetArtigoFamSfa
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
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param string $familia
     * @return GetArtigoFamSfa
     */
    public function withFamilia($familia)
    {
        $new = clone $this;
        $new->familia = $familia;

        return $new;
    }

    /**
     * @return string
     */
    public function getSubfamilia()
    {
        return $this->subfamilia;
    }

    /**
     * @param string $subfamilia
     * @return GetArtigoFamSfa
     */
    public function withSubfamilia($subfamilia)
    {
        $new = clone $this;
        $new->subfamilia = $subfamilia;

        return $new;
    }


}

