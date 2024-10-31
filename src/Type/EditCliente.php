<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditCliente implements RequestInterface
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
    private $cliente = null;

    /**
     * @var string
     */
    private $nome = null;

    /**
     * @var string
     */
    private $morada = null;

    /**
     * @var string
     */
    private $localidade = null;

    /**
     * @var string
     */
    private $codPostal = null;

    /**
     * @var string
     */
    private $pais = null;

    /**
     * @var string
     */
    private $telefone = null;

    /**
     * @var string
     */
    private $fax = null;

    /**
     * @var string
     */
    private $telemovel = null;

    /**
     * @var string
     */
    private $email = null;

    /**
     * @var string
     */
    private $nif = null;

    /**
     * @var string
     */
    private $contacto = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $cliente
     * @var string $nome
     * @var string $morada
     * @var string $localidade
     * @var string $codPostal
     * @var string $pais
     * @var string $telefone
     * @var string $fax
     * @var string $telemovel
     * @var string $email
     * @var string $nif
     * @var string $contacto
     */
    public function __construct($empresa, $password, $cliente, $nome, $morada, $localidade, $codPostal, $pais, $telefone, $fax, $telemovel, $email, $nif, $contacto)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->cliente = $cliente;
        $this->nome = $nome;
        $this->morada = $morada;
        $this->localidade = $localidade;
        $this->codPostal = $codPostal;
        $this->pais = $pais;
        $this->telefone = $telefone;
        $this->fax = $fax;
        $this->telemovel = $telemovel;
        $this->email = $email;
        $this->nif = $nif;
        $this->contacto = $contacto;
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
     * @return EditCliente
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
     * @return EditCliente
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
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param string $cliente
     * @return EditCliente
     */
    public function withCliente($cliente)
    {
        $new = clone $this;
        $new->cliente = $cliente;

        return $new;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return EditCliente
     */
    public function withNome($nome)
    {
        $new = clone $this;
        $new->nome = $nome;

        return $new;
    }

    /**
     * @return string
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * @param string $morada
     * @return EditCliente
     */
    public function withMorada($morada)
    {
        $new = clone $this;
        $new->morada = $morada;

        return $new;
    }

    /**
     * @return string
     */
    public function getLocalidade()
    {
        return $this->localidade;
    }

    /**
     * @param string $localidade
     * @return EditCliente
     */
    public function withLocalidade($localidade)
    {
        $new = clone $this;
        $new->localidade = $localidade;

        return $new;
    }

    /**
     * @return string
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * @param string $codPostal
     * @return EditCliente
     */
    public function withCodPostal($codPostal)
    {
        $new = clone $this;
        $new->codPostal = $codPostal;

        return $new;
    }

    /**
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param string $pais
     * @return EditCliente
     */
    public function withPais($pais)
    {
        $new = clone $this;
        $new->pais = $pais;

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
     * @return EditCliente
     */
    public function withTelefone($telefone)
    {
        $new = clone $this;
        $new->telefone = $telefone;

        return $new;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return EditCliente
     */
    public function withFax($fax)
    {
        $new = clone $this;
        $new->fax = $fax;

        return $new;
    }

    /**
     * @return string
     */
    public function getTelemovel()
    {
        return $this->telemovel;
    }

    /**
     * @param string $telemovel
     * @return EditCliente
     */
    public function withTelemovel($telemovel)
    {
        $new = clone $this;
        $new->telemovel = $telemovel;

        return $new;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return EditCliente
     */
    public function withEmail($email)
    {
        $new = clone $this;
        $new->email = $email;

        return $new;
    }

    /**
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param string $nif
     * @return EditCliente
     */
    public function withNif($nif)
    {
        $new = clone $this;
        $new->nif = $nif;

        return $new;
    }

    /**
     * @return string
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * @param string $contacto
     * @return EditCliente
     */
    public function withContacto($contacto)
    {
        $new = clone $this;
        $new->contacto = $contacto;

        return $new;
    }


}

