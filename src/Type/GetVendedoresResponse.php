<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetVendedoresResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetVendedoresResult = null;

    /**
     * @return string
     */
    public function getGetVendedoresResult()
    {
        return $this->GetVendedoresResult;
    }

    /**
     * @param string $GetVendedoresResult
     * @return GetVendedoresResponse
     */
    public function withGetVendedoresResult($GetVendedoresResult)
    {
        $new = clone $this;
        $new->GetVendedoresResult = $GetVendedoresResult;

        return $new;
    }


}

