<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetCondPagResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetCondPagResult = null;

    /**
     * @return string
     */
    public function getGetCondPagResult()
    {
        return $this->GetCondPagResult;
    }

    /**
     * @param string $GetCondPagResult
     * @return GetCondPagResponse
     */
    public function withGetCondPagResult($GetCondPagResult)
    {
        $new = clone $this;
        $new->GetCondPagResult = $GetCondPagResult;

        return $new;
    }


}

