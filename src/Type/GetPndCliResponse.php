<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetPndCliResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetPndCliResult = null;

    /**
     * @return string
     */
    public function getGetPndCliResult()
    {
        return $this->GetPndCliResult;
    }

    /**
     * @param string $GetPndCliResult
     * @return GetPndCliResponse
     */
    public function withGetPndCliResult($GetPndCliResult)
    {
        $new = clone $this;
        $new->GetPndCliResult = $GetPndCliResult;

        return $new;
    }


}

