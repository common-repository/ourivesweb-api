<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class DeleteInvoice implements RequestInterface
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
    private $motivo = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $numero
     * @var string $motivo
     */
    public function __construct($empresa, $password, $numero, $motivo)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->numero = $numero;
        $this->motivo = $motivo;
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
     * @return DeleteInvoice
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
     * @return DeleteInvoice
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
     * @return DeleteInvoice
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
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param string $motivo
     * @return DeleteInvoice
     */
    public function withMotivo($motivo)
    {
        $new = clone $this;
        $new->motivo = $motivo;

        return $new;
    }


}

