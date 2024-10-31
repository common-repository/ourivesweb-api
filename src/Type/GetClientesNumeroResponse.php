<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetClientesNumeroResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetClientesNumeroResult = null;

    /**
     * @return string
     */
    public function getGetClientesNumeroResult()
    {
        return $this->GetClientesNumeroResult;
    }

    /**
     * @param string $GetClientesNumeroResult
     * @return GetClientesNumeroResponse
     */
    public function withGetClientesNumeroResult($GetClientesNumeroResult)
    {
        $new = clone $this;
        $new->GetClientesNumeroResult = $GetClientesNumeroResult;

        return $new;
    }


}

