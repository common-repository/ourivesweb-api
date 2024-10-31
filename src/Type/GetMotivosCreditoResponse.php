<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetMotivosCreditoResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetMotivosCreditoResult = null;

    /**
     * @return string
     */
    public function getGetMotivosCreditoResult()
    {
        return $this->GetMotivosCreditoResult;
    }

    /**
     * @param string $GetMotivosCreditoResult
     * @return GetMotivosCreditoResponse
     */
    public function withGetMotivosCreditoResult($GetMotivosCreditoResult)
    {
        $new = clone $this;
        $new->GetMotivosCreditoResult = $GetMotivosCreditoResult;

        return $new;
    }


}

