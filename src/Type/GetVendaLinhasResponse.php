<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetVendaLinhasResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetVendaLinhasResult = null;

    /**
     * @return string
     */
    public function getGetVendaLinhasResult()
    {
        return $this->GetVendaLinhasResult;
    }

    /**
     * @param string $GetVendaLinhasResult
     * @return GetVendaLinhasResponse
     */
    public function withGetVendaLinhasResult($GetVendaLinhasResult)
    {
        $new = clone $this;
        $new->GetVendaLinhasResult = $GetVendaLinhasResult;

        return $new;
    }


}

