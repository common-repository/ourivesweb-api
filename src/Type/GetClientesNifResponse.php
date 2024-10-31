<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetClientesNifResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetClientesNifResult = null;

    /**
     * @return string
     */
    public function getGetClientesNifResult()
    {
        return $this->GetClientesNifResult;
    }

    /**
     * @param string $GetClientesNifResult
     * @return GetClientesNifResponse
     */
    public function withGetClientesNifResult($GetClientesNifResult)
    {
        $new = clone $this;
        $new->GetClientesNifResult = $GetClientesNifResult;

        return $new;
    }


}

