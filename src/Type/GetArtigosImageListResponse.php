<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetArtigosImageListResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigosImageListResult = null;

    /**
     * @return string
     */
    public function getGetArtigosImageListResult()
    {
        return $this->GetArtigosImageListResult;
    }

    /**
     * @param string $GetArtigosImageListResult
     * @return GetArtigosImageListResponse
     */
    public function withGetArtigosImageListResult($GetArtigosImageListResult)
    {
        $new = clone $this;
        $new->GetArtigosImageListResult = $GetArtigosImageListResult;

        return $new;
    }


}

