<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ValidaLoginResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $ValidaLoginResult = null;

    /**
     * @return string
     */
    public function getValidaLoginResult()
    {
        return $this->ValidaLoginResult;
    }

    /**
     * @param string $ValidaLoginResult
     * @return ValidaLoginResponse
     */
    public function withValidaLoginResult($ValidaLoginResult)
    {
        $new = clone $this;
        $new->ValidaLoginResult = $ValidaLoginResult;

        return $new;
    }


}

