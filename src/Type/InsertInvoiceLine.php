<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class InsertInvoiceLine implements RequestInterface
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
    private $referencia = null;

    /**
     * @var string
     */
    private $codigo = null;

    /**
     * @var string
     */
    private $descricao = null;

    /**
     * @var string
     */
    private $preco = null;

    /**
     * @var string
     */
    private $quantidade = null;

    /**
     * @var string
     */
    private $desconto = null;

    /**
     * @var string
     */
    private $iva = null;

    /**
     * @var string
     */
    private $armazem = null;

    /**
     * @var string
     */
    private $unidade = null;

    /**
     * @var string
     */
    private $ivaincluido = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $numero
     * @var string $referencia
     * @var string $codigo
     * @var string $descricao
     * @var string $preco
     * @var string $quantidade
     * @var string $desconto
     * @var string $iva
     * @var string $armazem
     * @var string $unidade
     * @var string $ivaincluido
     */
    public function __construct($empresa, $password, $numero, $referencia, $codigo, $descricao, $preco, $quantidade, $desconto, $iva, $armazem, $unidade, $ivaincluido)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->numero = $numero;
        $this->referencia = $referencia;
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->desconto = $desconto;
        $this->iva = $iva;
        $this->armazem = $armazem;
        $this->unidade = $unidade;
        $this->ivaincluido = $ivaincluido;
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
     * @return InsertInvoiceLine
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
     * @return InsertInvoiceLine
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
     * @return InsertInvoiceLine
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
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param string $referencia
     * @return InsertInvoiceLine
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
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return InsertInvoiceLine
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return InsertInvoiceLine
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
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param string $preco
     * @return InsertInvoiceLine
     */
    public function withPreco($preco)
    {
        $new = clone $this;
        $new->preco = $preco;

        return $new;
    }

    /**
     * @return string
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param string $quantidade
     * @return InsertInvoiceLine
     */
    public function withQuantidade($quantidade)
    {
        $new = clone $this;
        $new->quantidade = $quantidade;

        return $new;
    }

    /**
     * @return string
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * @param string $desconto
     * @return InsertInvoiceLine
     */
    public function withDesconto($desconto)
    {
        $new = clone $this;
        $new->desconto = $desconto;

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
     * @return InsertInvoiceLine
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
    public function getArmazem()
    {
        return $this->armazem;
    }

    /**
     * @param string $armazem
     * @return InsertInvoiceLine
     */
    public function withArmazem($armazem)
    {
        $new = clone $this;
        $new->armazem = $armazem;

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
     * @return InsertInvoiceLine
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
    public function getIvaincluido()
    {
        return $this->ivaincluido;
    }

    /**
     * @param string $ivaincluido
     * @return InsertInvoiceLine
     */
    public function withIvaincluido($ivaincluido)
    {
        $new = clone $this;
        $new->ivaincluido = $ivaincluido;

        return $new;
    }


}

