<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class DeleteInvoiceResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $DeleteInvoiceResult = null;

    /**
     * @return string
     */
    public function getDeleteInvoiceResult()
    {
        return $this->DeleteInvoiceResult;
    }

    /**
     * @param string $DeleteInvoiceResult
     * @return DeleteInvoiceResponse
     */
    public function withDeleteInvoiceResult($DeleteInvoiceResult)
    {
        $new = clone $this;
        $new->DeleteInvoiceResult = $DeleteInvoiceResult;

        return $new;
    }


}

