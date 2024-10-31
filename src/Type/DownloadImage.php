<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\RequestInterface;

class DownloadImage implements RequestInterface
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
    private $artigo = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $artigo
     */
    public function __construct($empresa, $password, $artigo)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->artigo = $artigo;
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
     * @return DownloadImage
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
     * @return DownloadImage
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
    public function getArtigo()
    {
        return $this->artigo;
    }

    /**
     * @param string $artigo
     * @return DownloadImage
     */
    public function withArtigo($artigo)
    {
        $new = clone $this;
        $new->artigo = $artigo;

        return $new;
    }


}

