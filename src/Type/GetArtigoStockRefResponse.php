<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetArtigoStockRefResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigoStockRefResult = null;

    /**
     * @return string
     */
    public function getGetArtigoStockRefResult()
    {
        return $this->GetArtigoStockRefResult;
    }

    /**
     * @param string $GetArtigoStockRefResult
     * @return GetArtigoStockRefResponse
     */
    public function withGetArtigoStockRefResult($GetArtigoStockRefResult)
    {
        $new = clone $this;
        $new->GetArtigoStockRefResult = $GetArtigoStockRefResult;

        return $new;
    }


}

