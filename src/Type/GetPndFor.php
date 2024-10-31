<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetPndFor implements RequestInterface
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
    private $fornecedor = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $fornecedor
     */
    public function __construct($empresa, $password, $fornecedor)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->fornecedor = $fornecedor;
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
     * @return GetPndFor
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
     * @return GetPndFor
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
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * @param string $fornecedor
     * @return GetPndFor
     */
    public function withFornecedor($fornecedor)
    {
        $new = clone $this;
        $new->fornecedor = $fornecedor;

        return $new;
    }


}

