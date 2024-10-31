<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetSubFamiliasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetSubFamiliasResult = null;

    /**
     * @return string
     */
    public function getGetSubFamiliasResult()
    {
        return $this->GetSubFamiliasResult;
    }

    /**
     * @param string $GetSubFamiliasResult
     * @return GetSubFamiliasResponse
     */
    public function withGetSubFamiliasResult($GetSubFamiliasResult)
    {
        $new = clone $this;
        $new->GetSubFamiliasResult = $GetSubFamiliasResult;

        return $new;
    }


}

