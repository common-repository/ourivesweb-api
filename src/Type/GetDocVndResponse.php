<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetDocVndResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetDocVndResult = null;

    /**
     * @return string
     */
    public function getGetDocVndResult()
    {
        return $this->GetDocVndResult;
    }

    /**
     * @param string $GetDocVndResult
     * @return GetDocVndResponse
     */
    public function withGetDocVndResult($GetDocVndResult)
    {
        $new = clone $this;
        $new->GetDocVndResult = $GetDocVndResult;

        return $new;
    }


}

