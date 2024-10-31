<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetMateriasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetMateriasResult = null;

    /**
     * @return string
     */
    public function getGetMateriasResult()
    {
        return $this->GetMateriasResult;
    }

    /**
     * @param string $GetMateriasResult
     * @return GetMateriasResponse
     */
    public function withGetMateriasResult($GetMateriasResult)
    {
        $new = clone $this;
        $new->GetMateriasResult = $GetMateriasResult;

        return $new;
    }


}

