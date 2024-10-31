<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetPndForResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetPndForResult = null;

    /**
     * @return string
     */
    public function getGetPndForResult()
    {
        return $this->GetPndForResult;
    }

    /**
     * @param string $GetPndForResult
     * @return GetPndForResponse
     */
    public function withGetPndForResult($GetPndForResult)
    {
        $new = clone $this;
        $new->GetPndForResult = $GetPndForResult;

        return $new;
    }


}

