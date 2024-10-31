<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class InsertInvoiceResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $InsertInvoiceResult = null;

    /**
     * @return string
     */
    public function getInsertInvoiceResult()
    {
        return $this->InsertInvoiceResult;
    }

    /**
     * @param string $InsertInvoiceResult
     * @return InsertInvoiceResponse
     */
    public function withInsertInvoiceResult($InsertInvoiceResult)
    {
        $new = clone $this;
        $new->InsertInvoiceResult = $InsertInvoiceResult;

        return $new;
    }


}

