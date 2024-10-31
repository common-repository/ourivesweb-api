<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetForneceTlfResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetForneceTlfResult = null;

    /**
     * @return string
     */
    public function getGetForneceTlfResult()
    {
        return $this->GetForneceTlfResult;
    }

    /**
     * @param string $GetForneceTlfResult
     * @return GetForneceTlfResponse
     */
    public function withGetForneceTlfResult($GetForneceTlfResult)
    {
        $new = clone $this;
        $new->GetForneceTlfResult = $GetForneceTlfResult;

        return $new;
    }


}

