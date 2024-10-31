<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetFamiliasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetFamiliasResult = null;

    /**
     * @return string
     */
    public function getGetFamiliasResult()
    {
        return $this->GetFamiliasResult;
    }

    /**
     * @param string $GetFamiliasResult
     * @return GetFamiliasResponse
     */
    public function withGetFamiliasResult($GetFamiliasResult)
    {
        $new = clone $this;
        $new->GetFamiliasResult = $GetFamiliasResult;

        return $new;
    }


}

