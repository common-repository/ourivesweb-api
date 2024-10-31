<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetStockUpdatesbyMinutesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetStockUpdatesbyMinutesResult = null;

    /**
     * @return string
     */
    public function getGetStockUpdatesbyMinutesResult()
    {
        return $this->GetStockUpdatesbyMinutesResult;
    }

    /**
     * @param string $GetStockUpdatesbyMinutesResult
     * @return GetStockUpdatesbyMinutesResponse
     */
    public function withGetStockUpdatesbyMinutesResult($GetStockUpdatesbyMinutesResult)
    {
        $new = clone $this;
        $new->GetStockUpdatesbyMinutesResult = $GetStockUpdatesbyMinutesResult;

        return $new;
    }


}

