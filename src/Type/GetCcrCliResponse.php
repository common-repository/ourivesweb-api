<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetCcrCliResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetCcrCliResult = null;

    /**
     * @return string
     */
    public function getGetCcrCliResult()
    {
        return $this->GetCcrCliResult;
    }

    /**
     * @param string $GetCcrCliResult
     * @return GetCcrCliResponse
     */
    public function withGetCcrCliResult($GetCcrCliResult)
    {
        $new = clone $this;
        $new->GetCcrCliResult = $GetCcrCliResult;

        return $new;
    }


}

