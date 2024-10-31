<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class InvoicePdfResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $InvoicePdfResult = null;

    /**
     * @return string
     */
    public function getInvoicePdfResult()
    {
        return $this->InvoicePdfResult;
    }

    /**
     * @param string $InvoicePdfResult
     * @return InvoicePdfResponse
     */
    public function withInvoicePdfResult($InvoicePdfResult)
    {
        $new = clone $this;
        $new->InvoicePdfResult = $InvoicePdfResult;

        return $new;
    }


}

