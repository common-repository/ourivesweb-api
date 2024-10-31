<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigosResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigosResult = null;

    /**
     * @return string
     */
    public function getGetArtigosResult()
    {
        return $this->GetArtigosResult;
    }

    /**
     * @param string $GetArtigosResult
     * @return GetArtigosResponse
     */
    public function withGetArtigosResult($GetArtigosResult)
    {
        $new = clone $this;
        $new->GetArtigosResult = $GetArtigosResult;

        return $new;
    }


}

