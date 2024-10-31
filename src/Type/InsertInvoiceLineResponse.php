<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class InsertInvoiceLineResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $InsertInvoiceLineResult = null;

    /**
     * @return string
     */
    public function getInsertInvoiceLineResult()
    {
        return $this->InsertInvoiceLineResult;
    }

    /**
     * @param string $InsertInvoiceLineResult
     * @return InsertInvoiceLineResponse
     */
    public function withInsertInvoiceLineResult($InsertInvoiceLineResult)
    {
        $new = clone $this;
        $new->InsertInvoiceLineResult = $InsertInvoiceLineResult;

        return $new;
    }


}

