<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class PayInvoiceResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $PayInvoiceResult = null;

    /**
     * @return string
     */
    public function getPayInvoiceResult()
    {
        return $this->PayInvoiceResult;
    }

    /**
     * @param string $PayInvoiceResult
     * @return PayInvoiceResponse
     */
    public function withPayInvoiceResult($PayInvoiceResult)
    {
        $new = clone $this;
        $new->PayInvoiceResult = $PayInvoiceResult;

        return $new;
    }


}

