<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetCcrCli implements RequestInterface
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
    private $cliente = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $cliente
     */
    public function __construct($empresa, $password, $cliente)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->cliente = $cliente;
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
     * @return GetCcrCli
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
     * @return GetCcrCli
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
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param string $cliente
     * @return GetCcrCli
     */
    public function withCliente($cliente)
    {
        $new = clone $this;
        $new->cliente = $cliente;

        return $new;
    }


}

