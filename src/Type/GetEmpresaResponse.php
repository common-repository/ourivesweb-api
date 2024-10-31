<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetEmpresaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetEmpresaResult = null;

    /**
     * @return string
     */
    public function getGetEmpresaResult()
    {
        return $this->GetEmpresaResult;
    }

    /**
     * @param string $GetEmpresaResult
     * @return GetEmpresaResponse
     */
    public function withGetEmpresaResult($GetEmpresaResult)
    {
        $new = clone $this;
        $new->GetEmpresaResult = $GetEmpresaResult;

        return $new;
    }


}

