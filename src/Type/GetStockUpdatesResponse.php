<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetStockUpdatesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetStockUpdatesResult = null;

    /**
     * @return string
     */
    public function getGetStockUpdatesResult()
    {
        return $this->GetStockUpdatesResult;
    }

    /**
     * @param string $GetStockUpdatesResult
     * @return GetStockUpdatesResponse
     */
    public function withGetStockUpdatesResult($GetStockUpdatesResult)
    {
        $new = clone $this;
        $new->GetStockUpdatesResult = $GetStockUpdatesResult;

        return $new;
    }


}

