<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class GetClientesMailResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $GetClientesMailResult = null;

    /**
     * @return string
     */
    public function getGetClientesMailResult()
    {
        return $this->GetClientesMailResult;
    }

    /**
     * @param string $GetClientesMailResult
     * @return GetClientesMailResponse
     */
    public function withGetClientesMailResult($GetClientesMailResult)
    {
        $new = clone $this;
        $new->GetClientesMailResult = $GetClientesMailResult;

        return $new;
    }


}

