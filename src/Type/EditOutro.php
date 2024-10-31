<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class EditOutro implements RequestInterface
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
    private $terceiro = null;

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
    private $contribuin = null;

    /**
     * @var string
     */
    private $contacto = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $terceiro
     * @var string $nome
     * @var string $morada
     * @var string $localidade
     * @var string $codPostal
     * @var string $pais
     * @var string $telefone
     * @var string $fax
     * @var string $telemovel
     * @var string $contribuin
     * @var string $contacto
     */
    public function __construct($empresa, $password, $terceiro, $nome, $morada, $localidade, $codPostal, $pais, $telefone, $fax, $telemovel, $contribuin, $contacto)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->terceiro = $terceiro;
        $this->nome = $nome;
        $this->morada = $morada;
        $this->localidade = $localidade;
        $this->codPostal = $codPostal;
        $this->pais = $pais;
        $this->telefone = $telefone;
        $this->fax = $fax;
        $this->telemovel = $telemovel;
        $this->contribuin = $contribuin;
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
     * @return EditOutro
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
     * @return EditOutro
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
    public function getTerceiro()
    {
        return $this->terceiro;
    }

    /**
     * @param string $terceiro
     * @return EditOutro
     */
    public function withTerceiro($terceiro)
    {
        $new = clone $this;
        $new->terceiro = $terceiro;

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
     * @return EditOutro
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
     * @return EditOutro
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
     * @return EditOutro
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
     * @return EditOutro
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
     * @return EditOutro
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
     * @return EditOutro
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
     * @return EditOutro
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
     * @return EditOutro
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
    public function getContribuin()
    {
        return $this->contribuin;
    }

    /**
     * @param string $contribuin
     * @return EditOutro
     */
    public function withContribuin($contribuin)
    {
        $new = clone $this;
        $new->contribuin = $contribuin;

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
     * @return EditOutro
     */
    public function withContacto($contacto)
    {
        $new = clone $this;
        $new->contacto = $contacto;

        return $new;
    }


}

