<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class InvoiceMotivoCreditoResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $InvoiceMotivoCreditoResult = null;

    /**
     * @return string
     */
    public function getInvoiceMotivoCreditoResult()
    {
        return $this->InvoiceMotivoCreditoResult;
    }

    /**
     * @param string $InvoiceMotivoCreditoResult
     * @return InvoiceMotivoCreditoResponse
     */
    public function withInvoiceMotivoCreditoResult($InvoiceMotivoCreditoResult)
    {
        $new = clone $this;
        $new->InvoiceMotivoCreditoResult = $InvoiceMotivoCreditoResult;

        return $new;
    }


}

