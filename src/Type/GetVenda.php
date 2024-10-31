<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetVenda implements RequestInterface
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
    private $documento = null;

    /**
     * @var string
     */
    private $seccao = null;

    /**
     * @var string
     */
    private $numero = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $documento
     * @var string $seccao
     * @var string $numero
     */
    public function __construct($empresa, $password, $documento, $seccao, $numero)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->documento = $documento;
        $this->seccao = $seccao;
        $this->numero = $numero;
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
     * @return GetVenda
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
     * @return GetVenda
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
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param string $documento
     * @return GetVenda
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
    public function getSeccao()
    {
        return $this->seccao;
    }

    /**
     * @param string $seccao
     * @return GetVenda
     */
    public function withSeccao($seccao)
    {
        $new = clone $this;
        $new->seccao = $seccao;

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
     * @return GetVenda
     */
    public function withNumero($numero)
    {
        $new = clone $this;
        $new->numero = $numero;

        return $new;
    }


}

