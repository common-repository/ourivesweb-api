<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetArtigosUpdatesbyMinutes implements RequestInterface
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
    private $minutos = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $minutos
     */
    public function __construct($empresa, $password, $minutos)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->minutos = $minutos;
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
     * @return GetArtigosUpdatesbyMinutes
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
     * @return GetArtigosUpdatesbyMinutes
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
    public function getMinutos()
    {
        return $this->minutos;
    }

    /**
     * @param string $minutos
     * @return GetArtigosUpdatesbyMinutes
     */
    public function withMinutos($minutos)
    {
        $new = clone $this;
        $new->minutos = $minutos;

        return $new;
    }


}

