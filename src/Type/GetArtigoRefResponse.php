<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetArtigoRefResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetArtigoRefResult = null;

    /**
     * @return string
     */
    public function getGetArtigoRefResult()
    {
        return $this->GetArtigoRefResult;
    }

    /**
     * @param string $GetArtigoRefResult
     * @return GetArtigoRefResponse
     */
    public function withGetArtigoRefResult($GetArtigoRefResult)
    {
        $new = clone $this;
        $new->GetArtigoRefResult = $GetArtigoRefResult;

        return $new;
    }


}

