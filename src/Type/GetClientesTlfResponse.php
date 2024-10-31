<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetClientesTlfResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetClientesTlfResult = null;

    /**
     * @return string
     */
    public function getGetClientesTlfResult()
    {
        return $this->GetClientesTlfResult;
    }

    /**
     * @param string $GetClientesTlfResult
     * @return GetClientesTlfResponse
     */
    public function withGetClientesTlfResult($GetClientesTlfResult)
    {
        $new = clone $this;
        $new->GetClientesTlfResult = $GetClientesTlfResult;

        return $new;
    }


}

