<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class CloseInvoice implements RequestInterface
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
    private $seccao = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $numero
     * @var string $seccao
     */
    public function __construct($empresa, $password, $numero, $seccao)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->numero = $numero;
        $this->seccao = $seccao;
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
     * @return CloseInvoice
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
     * @return CloseInvoice
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
     * @return CloseInvoice
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
    public function getSeccao()
    {
        return $this->seccao;
    }

    /**
     * @param string $seccao
     * @return CloseInvoice
     */
    public function withSeccao($seccao)
    {
        $new = clone $this;
        $new->seccao = $seccao;

        return $new;
    }


}

