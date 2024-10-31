<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetClientesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetClientesResult = null;

    /**
     * @return string
     */
    public function getGetClientesResult()
    {
        return $this->GetClientesResult;
    }

    /**
     * @param string $GetClientesResult
     * @return GetClientesResponse
     */
    public function withGetClientesResult($GetClientesResult)
    {
        $new = clone $this;
        $new->GetClientesResult = $GetClientesResult;

        return $new;
    }


}

