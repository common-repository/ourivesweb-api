<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetForneceMailResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetForneceMailResult = null;

    /**
     * @return string
     */
    public function getGetForneceMailResult()
    {
        return $this->GetForneceMailResult;
    }

    /**
     * @param string $GetForneceMailResult
     * @return GetForneceMailResponse
     */
    public function withGetForneceMailResult($GetForneceMailResult)
    {
        $new = clone $this;
        $new->GetForneceMailResult = $GetForneceMailResult;

        return $new;
    }


}

