<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditSubFamilia implements RequestInterface
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
    private $subfamilia = null;

    /**
     * @var string
     */
    private $descricao = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $subfamilia
     * @var string $descricao
     */
    public function __construct($empresa, $password, $subfamilia, $descricao)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->subfamilia = $subfamilia;
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
     * @return EditSubFamilia
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
     * @return EditSubFamilia
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
    public function getSubfamilia()
    {
        return $this->subfamilia;
    }

    /**
     * @param string $subfamilia
     * @return EditSubFamilia
     */
    public function withSubfamilia($subfamilia)
    {
        $new = clone $this;
        $new->subfamilia = $subfamilia;

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
     * @return EditSubFamilia
     */
    public function withDescricao($descricao)
    {
        $new = clone $this;
        $new->descricao = $descricao;

        return $new;
    }


}

