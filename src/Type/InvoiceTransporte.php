<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\RequestInterface;

class InvoiceTransporte implements RequestInterface
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
    private $des_mor = null;

    /**
     * @var string
     */
    private $des_loc = null;

    /**
     * @var string
     */
    private $des_cdp = null;

    /**
     * @var string
     */
    private $des_pais = null;

    /**
     * @var string
     */
    private $car_mor = null;

    /**
     * @var string
     */
    private $car_loc = null;

    /**
     * @var string
     */
    private $car_cdp = null;

    /**
     * @var string
     */
    private $car_pais = null;

    /**
     * Constructor
     *
     * @var string $empresa
     * @var string $password
     * @var string $numero
     * @var string $des_mor
     * @var string $des_loc
     * @var string $des_cdp
     * @var string $des_pais
     * @var string $car_mor
     * @var string $car_loc
     * @var string $car_cdp
     * @var string $car_pais
     */
    public function __construct($empresa, $password, $numero, $des_mor, $des_loc, $des_cdp, $des_pais, $car_mor, $car_loc, $car_cdp, $car_pais)
    {
        $this->empresa = $empresa;
        $this->password = $password;
        $this->numero = $numero;
        $this->des_mor = $des_mor;
        $this->des_loc = $des_loc;
        $this->des_cdp = $des_cdp;
        $this->des_pais = $des_pais;
        $this->car_mor = $car_mor;
        $this->car_loc = $car_loc;
        $this->car_cdp = $car_cdp;
        $this->car_pais = $car_pais;
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
     * @return InvoiceTransporte
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
     * @return InvoiceTransporte
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
     * @return InvoiceTransporte
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
    public function getDes_mor()
    {
        return $this->des_mor;
    }

    /**
     * @param string $des_mor
     * @return InvoiceTransporte
     */
    public function withDes_mor($des_mor)
    {
        $new = clone $this;
        $new->des_mor = $des_mor;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_loc()
    {
        return $this->des_loc;
    }

    /**
     * @param string $des_loc
     * @return InvoiceTransporte
     */
    public function withDes_loc($des_loc)
    {
        $new = clone $this;
        $new->des_loc = $des_loc;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_cdp()
    {
        return $this->des_cdp;
    }

    /**
     * @param string $des_cdp
     * @return InvoiceTransporte
     */
    public function withDes_cdp($des_cdp)
    {
        $new = clone $this;
        $new->des_cdp = $des_cdp;

        return $new;
    }

    /**
     * @return string
     */
    public function getDes_pais()
    {
        return $this->des_pais;
    }

    /**
     * @param string $des_pais
     * @return InvoiceTransporte
     */
    public function withDes_pais($des_pais)
    {
        $new = clone $this;
        $new->des_pais = $des_pais;

        return $new;
    }

    /**
     * @return string
     */
    public function getCar_mor()
    {
        return $this->car_mor;
    }

    /**
     * @param string $car_mor
     * @return InvoiceTransporte
     */
    public function withCar_mor($car_mor)
    {
        $new = clone $this;
        $new->car_mor = $car_mor;

        return $new;
    }

    /**
     * @return string
     */
    public function getCar_loc()
    {
        return $this->car_loc;
    }

    /**
     * @param string $car_loc
     * @return InvoiceTransporte
     */
    public function withCar_loc($car_loc)
    {
        $new = clone $this;
        $new->car_loc = $car_loc;

        return $new;
    }

    /**
     * @return string
     */
    public function getCar_cdp()
    {
        return $this->car_cdp;
    }

    /**
     * @param string $car_cdp
     * @return InvoiceTransporte
     */
    public function withCar_cdp($car_cdp)
    {
        $new = clone $this;
        $new->car_cdp = $car_cdp;

        return $new;
    }

    /**
     * @return string
     */
    public function getCar_pais()
    {
        return $this->car_pais;
    }

    /**
     * @param string $car_pais
     * @return InvoiceTransporte
     */
    public function withCar_pais($car_pais)
    {
        $new = clone $this;
        $new->car_pais = $car_pais;

        return $new;
    }


}

