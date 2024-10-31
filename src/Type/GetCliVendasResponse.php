<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetCliVendasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetCliVendasResult = null;

    /**
     * @return string
     */
    public function getGetCliVendasResult()
    {
        return $this->GetCliVendasResult;
    }

    /**
     * @param string $GetCliVendasResult
     * @return GetCliVendasResponse
     */
    public function withGetCliVendasResult($GetCliVendasResult)
    {
        $new = clone $this;
        $new->GetCliVendasResult = $GetCliVendasResult;

        return $new;
    }


}

