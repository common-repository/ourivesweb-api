<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditArtigo implements RequestInterface
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
    private $referencia = null;

    /**
     * @var string
     */
    private $descricao = null;

    /**
     * @var string
     */
    private $codigo = null;

    /**
     * @var string
     */
    private $marca = null;

    /**
     * @var string
     */
    private $unidade = null;

    /**
     * @var string
     */
    private $codbarra = null;

    /**
     * @var string
     */
    private $refer2 = null;

    /**
     * @var string
     */
    private $pvp1 = null;

    /**
     * @var string
     */
    private $pvp2 = null;

    /**
     * @var string
     */
    private $pvp3 = null;

    /**
     * @var string
     */
    private $pvpiva1 = null;

    /**
     * @var string
     */
    private $pvpiva2 = null;

    /**
     * @var string
     */
    private $pvpiva3 = null;

    /**
     * @var string
     */
    private $custoIli = null;

    /**
     * @var string
     */
    private $custoPdr = null;

    /**
     * @var string
     */
    private $custoUlt = null;

    /**
     * @var string
     */
    private $margem1 = null;

    /**
     * @var string
     */
    private $margem2 = null;

    /**
     * @var string
     */
    private $margem3 = null;

    /**
     * @var string
     */
    private $iva = null;

    /**
     * @var string
     */
    private $peso = null;

    /**
     * @var string
     */
    private $ultFor = null;

    /**
     * @var string
     */
    private $familia = null;

    /**
     * @var string
     */
    private $subfamilia = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $referencia
     * @var string $descricao
     * @var string $codigo
     * @var string $marca
     * @var string $unidade
     * @var string $codbarra
     * @var string $refer2
     * @var string $pvp1
     * @var string $pvp2
     * @var string $pvp3
     * @var string $pvpiva1
     * @var string $pvpiva2
     * @var string $pvpiva3
     * @var string $custoIli
     * @var string $custoPdr
     * @var string $custoUlt
     * @var string $margem1
     * @var string $margem2
     * @var string $margem3
     * @var string $iva
     * @var string $peso
     * @var string $ultFor
     * @var string $familia
     * @var string $subfamilia
     */
    public function __construct($empresa, $password, $referencia, $descricao, $codigo, $marca, $unidade, $codbarra, $refer2, $pvp1, $pvp2, $pvp3, $pvpiva1, $pvpiva2, $pvpiva3, $custoIli, $custoPdr, $custoUlt, $margem1, $margem2, $margem3, $iva, $peso, $ultFor, $familia, $subfamilia)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->referencia = $referencia;
        $this->descricao = $descricao;
        $this->codigo = $codigo;
        $this->marca = $marca;
        $this->unidade = $unidade;
        $this->codbarra = $codbarra;
        $this->refer2 = $refer2;
        $this->pvp1 = $pvp1;
        $this->pvp2 = $pvp2;
        $this->pvp3 = $pvp3;
        $this->pvpiva1 = $pvpiva1;
        $this->pvpiva2 = $pvpiva2;
        $this->pvpiva3 = $pvpiva3;
        $this->custoIli = $custoIli;
        $this->custoPdr = $custoPdr;
        $this->custoUlt = $custoUlt;
        $this->margem1 = $margem1;
        $this->margem2 = $margem2;
        $this->margem3 = $margem3;
        $this->iva = $iva;
        $this->peso = $peso;
        $this->ultFor = $ultFor;
        $this->familia = $familia;
        $this->subfamilia = $subfamilia;
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
     * @return EditArtigo
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
     * @return EditArtigo
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
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param string $referencia
     * @return EditArtigo
     */
    public function withReferencia($referencia)
    {
        $new = clone $this;
        $new->referencia = $referencia;

        return $new;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return EditArtigo
     */
    public function withDescricao($descricao)
    {
        $new = clone $this;
        $new->descricao = $descricao;

        return $new;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return EditArtigo
     */
    public function withCodigo($codigo)
    {
        $new = clone $this;
        $new->codigo = $codigo;

        return $new;
    }

    /**
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     * @return EditArtigo
     */
    public function withMarca($marca)
    {
        $new = clone $this;
        $new->marca = $marca;

        return $new;
    }

    /**
     * @return string
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * @param string $unidade
     * @return EditArtigo
     */
    public function withUnidade($unidade)
    {
        $new = clone $this;
        $new->unidade = $unidade;

        return $new;
    }

    /**
     * @return string
     */
    public function getCodbarra()
    {
        return $this->codbarra;
    }

    /**
     * @param string $codbarra
     * @return EditArtigo
     */
    public function withCodbarra($codbarra)
    {
        $new = clone $this;
        $new->codbarra = $codbarra;

        return $new;
    }

    /**
     * @return string
     */
    public function getRefer2()
    {
        return $this->refer2;
    }

    /**
     * @param string $refer2
     * @return EditArtigo
     */
    public function withRefer2($refer2)
    {
        $new = clone $this;
        $new->refer2 = $refer2;

        return $new;
    }

    /**
     * @return string
     */
    public function getPvp1()
    {
        return $this->pvp1;
    }

    /**
     * @param string $pvp1
     * @return EditArtigo
     */
    public function withPvp1($pvp1)
    {
        $new = clone $this;
        $new->pvp1 = $pvp1;

        return $new;
    }

    /**
     * @return string
     */
    public function getPvp2()
    {
        return $this->pvp2;
    }

    /**
     * @param string $pvp2
     * @return EditArtigo
     */
    public function withPvp2($pvp2)
    {
        $new = clone $this;
        $new->pvp2 = $pvp2;

        return $new;
    }

    /**
     * @return string
     */
    public function getPvp3()
    {
        return $this->pvp3;
    }

    /**
     * @param string $pvp3
     * @return EditArtigo
     */
    public function withPvp3($pvp3)
    {
        $new = clone $this;
        $new->pvp3 = $pvp3;

        return $new;
    }

    /**
     * @return string
     */
    public function getPvpiva1()
    {
        return $this->pvpiva1;
    }

    /**
     * @param string $pvpiva1
     * @return EditArtigo
     */
    public function withPvpiva1($pvpiva1)
    {
        $new = clone $this;
        $new->pvpiva1 = $pvpiva1;

        return $new;
    }

    /**
     * @return string
     */
    public function getPvpiva2()
    {
        return $this->pvpiva2;
    }

    /**
     * @param string $pvpiva2
     * @return EditArtigo
     */
    public function withPvpiva2($pvpiva2)
    {
        $new = clone $this;
        $new->pvpiva2 = $pvpiva2;

        return $new;
    }

    /**
     * @return string
     */
    public function getPvpiva3()
    {
        return $this->pvpiva3;
    }

    /**
     * @param string $pvpiva3
     * @return EditArtigo
     */
    public function withPvpiva3($pvpiva3)
    {
        $new = clone $this;
        $new->pvpiva3 = $pvpiva3;

        return $new;
    }

    /**
     * @return string
     */
    public function getCustoIli()
    {
        return $this->custoIli;
    }

    /**
     * @param string $custoIli
     * @return EditArtigo
     */
    public function withCustoIli($custoIli)
    {
        $new = clone $this;
        $new->custoIli = $custoIli;

        return $new;
    }

    /**
     * @return string
     */
    public function getCustoPdr()
    {
        return $this->custoPdr;
    }

    /**
     * @param string $custoPdr
     * @return EditArtigo
     */
    public function withCustoPdr($custoPdr)
    {
        $new = clone $this;
        $new->custoPdr = $custoPdr;

        return $new;
    }

    /**
     * @return string
     */
    public function getCustoUlt()
    {
        return $this->custoUlt;
    }

    /**
     * @param string $custoUlt
     * @return EditArtigo
     */
    public function withCustoUlt($custoUlt)
    {
        $new = clone $this;
        $new->custoUlt = $custoUlt;

        return $new;
    }

    /**
     * @return string
     */
    public function getMargem1()
    {
        return $this->margem1;
    }

    /**
     * @param string $margem1
     * @return EditArtigo
     */
    public function withMargem1($margem1)
    {
        $new = clone $this;
        $new->margem1 = $margem1;

        return $new;
    }

    /**
     * @return string
     */
    public function getMargem2()
    {
        return $this->margem2;
    }

    /**
     * @param string $margem2
     * @return EditArtigo
     */
    public function withMargem2($margem2)
    {
        $new = clone $this;
        $new->margem2 = $margem2;

        return $new;
    }

    /**
     * @return string
     */
    public function getMargem3()
    {
        return $this->margem3;
    }

    /**
     * @param string $margem3
     * @return EditArtigo
     */
    public function withMargem3($margem3)
    {
        $new = clone $this;
        $new->margem3 = $margem3;

        return $new;
    }

    /**
     * @return string
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * @param string $iva
     * @return EditArtigo
     */
    public function withIva($iva)
    {
        $new = clone $this;
        $new->iva = $iva;

        return $new;
    }

    /**
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param string $peso
     * @return EditArtigo
     */
    public function withPeso($peso)
    {
        $new = clone $this;
        $new->peso = $peso;

        return $new;
    }

    /**
     * @return string
     */
    public function getUltFor()
    {
        return $this->ultFor;
    }

    /**
     * @param string $ultFor
     * @return EditArtigo
     */
    public function withUltFor($ultFor)
    {
        $new = clone $this;
        $new->ultFor = $ultFor;

        return $new;
    }

    /**
     * @return string
     */
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param string $familia
     * @return EditArtigo
     */
    public function withFamilia($familia)
    {
        $new = clone $this;
        $new->familia = $familia;

        return $new;
    }

    /**
     * @return string
     */
    public function getSubfamilia()
    {
        return $this->subfamilia;
    }

    /**
     * @param string $subfamilia
     * @return EditArtigo
     */
    public function withSubfamilia($subfamilia)
    {
        $new = clone $this;
        $new->subfamilia = $subfamilia;

        return $new;
    }


}

