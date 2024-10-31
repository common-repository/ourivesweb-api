<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class ReceiptPdfResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $ReceiptPdfResult = null;

    /**
     * @return string
     */
    public function getReceiptPdfResult()
    {
        return $this->ReceiptPdfResult;
    }

    /**
     * @param string $ReceiptPdfResult
     * @return ReceiptPdfResponse
     */
    public function withReceiptPdfResult($ReceiptPdfResult)
    {
        $new = clone $this;
        $new->ReceiptPdfResult = $ReceiptPdfResult;

        return $new;
    }


}

