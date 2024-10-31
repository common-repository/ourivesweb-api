<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetMarcasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetMarcasResult = null;

    /**
     * @return string
     */
    public function getGetMarcasResult()
    {
        return $this->GetMarcasResult;
    }

    /**
     * @param string $GetMarcasResult
     * @return GetMarcasResponse
     */
    public function withGetMarcasResult($GetMarcasResult)
    {
        $new = clone $this;
        $new->GetMarcasResult = $GetMarcasResult;

        return $new;
    }


}

