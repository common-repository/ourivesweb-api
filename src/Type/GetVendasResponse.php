<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetVendasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetVendasResult = null;

    /**
     * @return string
     */
    public function getGetVendasResult()
    {
        return $this->GetVendasResult;
    }

    /**
     * @param string $GetVendasResult
     * @return GetVendasResponse
     */
    public function withGetVendasResult($GetVendasResult)
    {
        $new = clone $this;
        $new->GetVendasResult = $GetVendasResult;

        return $new;
    }


}

