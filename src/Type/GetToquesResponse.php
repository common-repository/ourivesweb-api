<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetToquesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetToquesResult = null;

    /**
     * @return string
     */
    public function getGetToquesResult()
    {
        return $this->GetToquesResult;
    }

    /**
     * @param string $GetToquesResult
     * @return GetToquesResponse
     */
    public function withGetToquesResult($GetToquesResult)
    {
        $new = clone $this;
        $new->GetToquesResult = $GetToquesResult;

        return $new;
    }


}

