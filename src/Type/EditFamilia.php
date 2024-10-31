<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditFamilia implements RequestInterface
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
    private $familia = null;

    /**
     * @var string
     */
    private $descricao = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $familia
     * @var string $descricao
     */
    public function __construct($empresa, $password, $familia, $descricao)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->familia = $familia;
        $this->descricao = $descricao;
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
     * @return EditFamilia
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
     * @return EditFamilia
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
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * @param string $familia
     * @return EditFamilia
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return EditFamilia
     */
    public function withDescricao($descricao)
    {
        $new = clone $this;
        $new->descricao = $descricao;

        return $new;
    }


}

