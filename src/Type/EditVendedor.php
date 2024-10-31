<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditVendedor implements RequestInterface
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
    private $vendedor = null;

    /**
     * @var string
     */
    private $nome = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $vendedor
     * @var string $nome
     */
    public function __construct($empresa, $password, $vendedor, $nome)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->vendedor = $vendedor;
        $this->nome = $nome;
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
     * @return EditVendedor
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
     * @return EditVendedor
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
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param string $vendedor
     * @return EditVendedor
     */
    public function withVendedor($vendedor)
    {
        $new = clone $this;
        $new->vendedor = $vendedor;

        return $new;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return EditVendedor
     */
    public function withNome($nome)
    {
        $new = clone $this;
        $new->nome = $nome;

        return $new;
    }


}

