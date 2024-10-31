<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetPaisesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetPaisesResult = null;

    /**
     * @return string
     */
    public function getGetPaisesResult()
    {
        return $this->GetPaisesResult;
    }

    /**
     * @param string $GetPaisesResult
     * @return GetPaisesResponse
     */
    public function withGetPaisesResult($GetPaisesResult)
    {
        $new = clone $this;
        $new->GetPaisesResult = $GetPaisesResult;

        return $new;
    }


}

