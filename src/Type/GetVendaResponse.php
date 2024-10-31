<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetVendaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetVendaResult = null;

    /**
     * @return string
     */
    public function getGetVendaResult()
    {
        return $this->GetVendaResult;
    }

    /**
     * @param string $GetVendaResult
     * @return GetVendaResponse
     */
    public function withGetVendaResult($GetVendaResult)
    {
        $new = clone $this;
        $new->GetVendaResult = $GetVendaResult;

        return $new;
    }


}

