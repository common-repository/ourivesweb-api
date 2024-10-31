<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetForneceNifResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetForneceNifResult = null;

    /**
     * @return string
     */
    public function getGetForneceNifResult()
    {
        return $this->GetForneceNifResult;
    }

    /**
     * @param string $GetForneceNifResult
     * @return GetForneceNifResponse
     */
    public function withGetForneceNifResult($GetForneceNifResult)
    {
        $new = clone $this;
        $new->GetForneceNifResult = $GetForneceNifResult;

        return $new;
    }


}

