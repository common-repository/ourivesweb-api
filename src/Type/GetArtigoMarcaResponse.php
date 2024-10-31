<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigoMarcaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigoMarcaResult = null;

    /**
     * @return string
     */
    public function getGetArtigoMarcaResult()
    {
        return $this->GetArtigoMarcaResult;
    }

    /**
     * @param string $GetArtigoMarcaResult
     * @return GetArtigoMarcaResponse
     */
    public function withGetArtigoMarcaResult($GetArtigoMarcaResult)
    {
        $new = clone $this;
        $new->GetArtigoMarcaResult = $GetArtigoMarcaResult;

        return $new;
    }


}

