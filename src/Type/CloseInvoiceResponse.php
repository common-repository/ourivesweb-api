<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class CloseInvoiceResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $CloseInvoiceResult = null;

    /**
     * @return string
     */
    public function getCloseInvoiceResult()
    {
        return $this->CloseInvoiceResult;
    }

    /**
     * @param string $CloseInvoiceResult
     * @return CloseInvoiceResponse
     */
    public function withCloseInvoiceResult($CloseInvoiceResult)
    {
        $new = clone $this;
        $new->CloseInvoiceResult = $CloseInvoiceResult;

        return $new;
    }


}

