<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class PayInvoice implements RequestInterface
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
    private $valor = null;

    /**
     * @var string
     */
    private $modpag = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $numero
     * @var string $valor
     * @var string $modpag
     */
    public function __construct($empresa, $password, $numero, $valor, $modpag)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->numero = $numero;
        $this->valor = $valor;
        $this->modpag = $modpag;
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
     * @return PayInvoice
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
     * @return PayInvoice
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
     * @return PayInvoice
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
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param string $valor
     * @return PayInvoice
     */
    public function withValor($valor)
    {
        $new = clone $this;
        $new->valor = $valor;

        return $new;
    }

    /**
     * @return string
     */
    public function getModpag()
    {
        return $this->modpag;
    }

    /**
     * @param string $modpag
     * @return PayInvoice
     */
    public function withModpag($modpag)
    {
        $new = clone $this;
        $new->modpag = $modpag;

        return $new;
    }


}

