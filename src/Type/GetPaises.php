<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetPaises implements RequestInterface
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
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     */
    public function __construct($empresa, $password)
    {
        $this->empresa = $empresa;
        $this->password = $password;
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
     * @return GetPaises
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
     * @return GetPaises
     */
    public function withPassword($password)
    {
        $new = clone $this;
        $new->password = $password;

        return $new;
    }


}

