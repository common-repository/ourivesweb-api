<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetVendas implements RequestInterface
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
    private $dataIni = null;

    /**
     * @var string
     */
    private $dataFim = null;

    /**
     * @var string
     */
    private $tipDoc = null;

    /**
     * @var string
     */
    private $seccao = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $dataIni
     * @var string $dataFim
     * @var string $tipDoc
     * @var string $seccao
     */
    public function __construct($empresa, $password, $dataIni, $dataFim, $tipDoc, $seccao)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->dataIni = $dataIni;
        $this->dataFim = $dataFim;
        $this->tipDoc = $tipDoc;
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
     * @return GetVendas
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
     * @return GetVendas
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
    public function getDataIni()
    {
        return $this->dataIni;
    }

    /**
     * @param string $dataIni
     * @return GetVendas
     */
    public function withDataIni($dataIni)
    {
        $new = clone $this;
        $new->dataIni = $dataIni;

        return $new;
    }

    /**
     * @return string
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * @param string $dataFim
     * @return GetVendas
     */
    public function withDataFim($dataFim)
    {
        $new = clone $this;
        $new->dataFim = $dataFim;

        return $new;
    }

    /**
     * @return string
     */
    public function getTipDoc()
    {
        return $this->tipDoc;
    }

    /**
     * @param string $tipDoc
     * @return GetVendas
     */
    public function withTipDoc($tipDoc)
    {
        $new = clone $this;
        $new->tipDoc = $tipDoc;

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
     * @return GetVendas
     */
    public function withSeccao($seccao)
    {
        $new = clone $this;
        $new->seccao = $seccao;

        return $new;
    }


}

