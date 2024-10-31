<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetForneceNumeroResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetForneceNumeroResult = null;

    /**
     * @return string
     */
    public function getGetForneceNumeroResult()
    {
        return $this->GetForneceNumeroResult;
    }

    /**
     * @param string $GetForneceNumeroResult
     * @return GetForneceNumeroResponse
     */
    public function withGetForneceNumeroResult($GetForneceNumeroResult)
    {
        $new = clone $this;
        $new->GetForneceNumeroResult = $GetForneceNumeroResult;

        return $new;
    }


}

