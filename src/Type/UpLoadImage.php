<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class UpLoadImage implements RequestInterface
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
    private $nomeimagem = null;

    /**
     * @var string
     */
    private $artigo = null;

    /**
     * @var string
     */
    private $ficheiro = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $nomeimagem
     * @var string $artigo
     * @var string $ficheiro
     */
    public function __construct($empresa, $password, $nomeimagem, $artigo, $ficheiro)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->nomeimagem = $nomeimagem;
        $this->artigo = $artigo;
        $this->ficheiro = $ficheiro;
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
     * @return UpLoadImage
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
     * @return UpLoadImage
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
    public function getNomeimagem()
    {
        return $this->nomeimagem;
    }

    /**
     * @param string $nomeimagem
     * @return UpLoadImage
     */
    public function withNomeimagem($nomeimagem)
    {
        $new = clone $this;
        $new->nomeimagem = $nomeimagem;

        return $new;
    }

    /**
     * @return string
     */
    public function getArtigo()
    {
        return $this->artigo;
    }

    /**
     * @param string $artigo
     * @return UpLoadImage
     */
    public function withArtigo($artigo)
    {
        $new = clone $this;
        $new->artigo = $artigo;

        return $new;
    }

    /**
     * @return string
     */
    public function getFicheiro()
    {
        return $this->ficheiro;
    }

    /**
     * @param string $ficheiro
     * @return UpLoadImage
     */
    public function withFicheiro($ficheiro)
    {
        $new = clone $this;
        $new->ficheiro = $ficheiro;

        return $new;
    }


}

