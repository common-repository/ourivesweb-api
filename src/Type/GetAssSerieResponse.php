<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetAssSerieResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetAssSerieResult = null;

    /**
     * @return string
     */
    public function getGetAssSerieResult()
    {
        return $this->GetAssSerieResult;
    }

    /**
     * @param string $GetAssSerieResult
     * @return GetAssSerieResponse
     */
    public function withGetAssSerieResult($GetAssSerieResult)
    {
        $new = clone $this;
        $new->GetAssSerieResult = $GetAssSerieResult;

        return $new;
    }


}

