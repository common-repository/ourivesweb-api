<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetModPagResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetModPagResult = null;

    /**
     * @return string
     */
    public function getGetModPagResult()
    {
        return $this->GetModPagResult;
    }

    /**
     * @param string $GetModPagResult
     * @return GetModPagResponse
     */
    public function withGetModPagResult($GetModPagResult)
    {
        $new = clone $this;
        $new->GetModPagResult = $GetModPagResult;

        return $new;
    }


}

