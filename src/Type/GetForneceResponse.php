<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetForneceResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetForneceResult = null;

    /**
     * @return string
     */
    public function getGetForneceResult()
    {
        return $this->GetForneceResult;
    }

    /**
     * @param string $GetForneceResult
     * @return GetForneceResponse
     */
    public function withGetForneceResult($GetForneceResult)
    {
        $new = clone $this;
        $new->GetForneceResult = $GetForneceResult;

        return $new;
    }


}

