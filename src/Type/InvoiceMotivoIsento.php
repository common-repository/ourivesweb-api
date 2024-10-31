<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class InvoiceMotivoIsento implements RequestInterface
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
    private $numero = null;

    /**
     * @var string
     */
    private $isento = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $numero
     * @var string $isento
     */
    public function __construct($empresa, $password, $numero, $isento)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->numero = $numero;
        $this->isento = $isento;
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
     * @return InvoiceMotivoIsento
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
     * @return InvoiceMotivoIsento
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     * @return InvoiceMotivoIsento
     */
    public function withNumero($numero)
    {
        $new = clone $this;
        $new->numero = $numero;

        return $new;
    }

    /**
     * @return string
     */
    public function getIsento()
    {
        return $this->isento;
    }

    /**
     * @param string $isento
     * @return InvoiceMotivoIsento
     */
    public function withIsento($isento)
    {
        $new = clone $this;
        $new->isento = $isento;

        return $new;
    }


}

