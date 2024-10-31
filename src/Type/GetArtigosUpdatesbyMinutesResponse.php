<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigosUpdatesbyMinutesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigosUpdatesbyMinutesResult = null;

    /**
     * @return string
     */
    public function getGetArtigosUpdatesbyMinutesResult()
    {
        return $this->GetArtigosUpdatesbyMinutesResult;
    }

    /**
     * @param string $GetArtigosUpdatesbyMinutesResult
     * @return GetArtigosUpdatesbyMinutesResponse
     */
    public function withGetArtigosUpdatesbyMinutesResult($GetArtigosUpdatesbyMinutesResult)
    {
        $new = clone $this;
        $new->GetArtigosUpdatesbyMinutesResult = $GetArtigosUpdatesbyMinutesResult;

        return $new;
    }


}

