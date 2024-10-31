<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetMotivosIsentoResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetMotivosIsentoResult = null;

    /**
     * @return string
     */
    public function getGetMotivosIsentoResult()
    {
        return $this->GetMotivosIsentoResult;
    }

    /**
     * @param string $GetMotivosIsentoResult
     * @return GetMotivosIsentoResponse
     */
    public function withGetMotivosIsentoResult($GetMotivosIsentoResult)
    {
        $new = clone $this;
        $new->GetMotivosIsentoResult = $GetMotivosIsentoResult;

        return $new;
    }


}

