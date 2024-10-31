<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetAssSerie implements RequestInterface
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
    private $serie = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $serie
     */
    public function __construct($empresa, $password, $serie)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->serie = $serie;
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
     * @return GetAssSerie
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
     * @return GetAssSerie
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
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param string $serie
     * @return GetAssSerie
     */
    public function withSerie($serie)
    {
        $new = clone $this;
        $new->serie = $serie;

        return $new;
    }


}

