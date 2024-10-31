<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetSeccoesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetSeccoesResult = null;

    /**
     * @return string
     */
    public function getGetSeccoesResult()
    {
        return $this->GetSeccoesResult;
    }

    /**
     * @param string $GetSeccoesResult
     * @return GetSeccoesResponse
     */
    public function withGetSeccoesResult($GetSeccoesResult)
    {
        $new = clone $this;
        $new->GetSeccoesResult = $GetSeccoesResult;

        return $new;
    }


}

