<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigosUpdatesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigosUpdatesResult = null;

    /**
     * @return string
     */
    public function getGetArtigosUpdatesResult()
    {
        return $this->GetArtigosUpdatesResult;
    }

    /**
     * @param string $GetArtigosUpdatesResult
     * @return GetArtigosUpdatesResponse
     */
    public function withGetArtigosUpdatesResult($GetArtigosUpdatesResult)
    {
        $new = clone $this;
        $new->GetArtigosUpdatesResult = $GetArtigosUpdatesResult;

        return $new;
    }


}

