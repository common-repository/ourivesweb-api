<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class InsertInvoice implements RequestInterface
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
     * @var string
     */
    private $documento = null;

    /**
     * @var string
     */
    private $obs = null;

    /**
     * @var string
     */
    private $vendedor = null;

    /**
     * @var string
     */
    private $condpag = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $cliente
     * @var string $documento
     * @var string $obs
     * @var string $vendedor
     * @var string $condpag
     */
    public function __construct($empresa, $password, $cliente, $documento, $obs, $vendedor, $condpag)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->cliente = $cliente;
        $this->documento = $documento;
        $this->obs = $obs;
        $this->vendedor = $vendedor;
        $this->condpag = $condpag;
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
     * @return InsertInvoice
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
     * @return InsertInvoice
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
     * @return InsertInvoice
     */
    public function withCliente($cliente)
    {
        $new = clone $this;
        $new->cliente = $cliente;

        return $new;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     * @return InsertInvoice
     */
    public function withDocumento($documento)
    {
        $new = clone $this;
        $new->documento = $documento;

        return $new;
    }

    /**
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param string $obs
     * @return InsertInvoice
     */
    public function withObs($obs)
    {
        $new = clone $this;
        $new->obs = $obs;

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
     * @return InsertInvoice
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
    public function getCondpag()
    {
        return $this->condpag;
    }

    /**
     * @param string $condpag
     * @return InsertInvoice
     */
    public function withCondpag($condpag)
    {
        $new = clone $this;
        $new->condpag = $condpag;

        return $new;
    }


}

