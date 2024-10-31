<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class GetForneceTlf implements RequestInterface
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
    private $telefone = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $telefone
     */
    public function __construct($empresa, $password, $telefone)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->telefone = $telefone;
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
     * @return GetForneceTlf
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
     * @return GetForneceTlf
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
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     * @return GetForneceTlf
     */
    public function withTelefone($telefone)
    {
        $new = clone $this;
        $new->telefone = $telefone;

        return $new;
    }


}

