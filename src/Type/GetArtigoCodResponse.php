<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigoCodResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigoCodResult = null;

    /**
     * @return string
     */
    public function getGetArtigoCodResult()
    {
        return $this->GetArtigoCodResult;
    }

    /**
     * @param string $GetArtigoCodResult
     * @return GetArtigoCodResponse
     */
    public function withGetArtigoCodResult($GetArtigoCodResult)
    {
        $new = clone $this;
        $new->GetArtigoCodResult = $GetArtigoCodResult;

        return $new;
    }


}

