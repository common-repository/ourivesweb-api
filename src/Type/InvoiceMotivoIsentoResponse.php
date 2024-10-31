<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class InvoiceMotivoIsentoResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $InvoiceMotivoIsentoResult = null;

    /**
     * @return string
     */
    public function getInvoiceMotivoIsentoResult()
    {
        return $this->InvoiceMotivoIsentoResult;
    }

    /**
     * @param string $InvoiceMotivoIsentoResult
     * @return InvoiceMotivoIsentoResponse
     */
    public function withInvoiceMotivoIsentoResult($InvoiceMotivoIsentoResult)
    {
        $new = clone $this;
        $new->InvoiceMotivoIsentoResult = $InvoiceMotivoIsentoResult;

        return $new;
    }


}

