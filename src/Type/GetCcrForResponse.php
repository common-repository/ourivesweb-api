<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetCcrForResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetCcrForResult = null;

    /**
     * @return string
     */
    public function getGetCcrForResult()
    {
        return $this->GetCcrForResult;
    }

    /**
     * @param string $GetCcrForResult
     * @return GetCcrForResponse
     */
    public function withGetCcrForResult($GetCcrForResult)
    {
        $new = clone $this;
        $new->GetCcrForResult = $GetCcrForResult;

        return $new;
    }


}

