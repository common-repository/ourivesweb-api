<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigoFamSfaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigoFamSfaResult = null;

    /**
     * @return string
     */
    public function getGetArtigoFamSfaResult()
    {
        return $this->GetArtigoFamSfaResult;
    }

    /**
     * @param string $GetArtigoFamSfaResult
     * @return GetArtigoFamSfaResponse
     */
    public function withGetArtigoFamSfaResult($GetArtigoFamSfaResult)
    {
        $new = clone $this;
        $new->GetArtigoFamSfaResult = $GetArtigoFamSfaResult;

        return $new;
    }


}

