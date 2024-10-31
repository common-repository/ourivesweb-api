<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditMarca implements RequestInterface
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
    private $marca = null;

    /**
     * @var string
     */
    private $descricao = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $marca
     * @var string $descricao
     */
    public function __construct($empresa, $password, $marca, $descricao)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->marca = $marca;
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
     * @return EditMarca
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
     * @return EditMarca
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
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     * @return EditMarca
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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return EditMarca
     */
    public function withDescricao($descricao)
    {
        $new = clone $this;
        $new->descricao = $descricao;

        return $new;
    }


}

