<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class VersaoResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $VersaoResult = null;

    /**
     * @return string
     */
    public function getVersaoResult()
    {
        return $this->VersaoResult;
    }

    /**
     * @param string $VersaoResult
     * @return VersaoResponse
     */
    public function withVersaoResult($VersaoResult)
    {
        $new = clone $this;
        $new->VersaoResult = $VersaoResult;

        return $new;
    }


}

