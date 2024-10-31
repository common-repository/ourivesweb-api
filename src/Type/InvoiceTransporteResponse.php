<?php

namespace OurivesWeb\Type;

use Phpro\SoapClient\Type\ResultInterface;

class InvoiceTransporteResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $InvoiceTransporteResult = null;

    /**
     * @return string
     */
    public function getInvoiceTransporteResult()
    {
        return $this->InvoiceTransporteResult;
    }

    /**
     * @param string $InvoiceTransporteResult
     * @return InvoiceTransporteResponse
     */
    public function withInvoiceTransporteResult($InvoiceTransporteResult)
    {
        $new = clone $this;
        $new->InvoiceTransporteResult = $InvoiceTransporteResult;

        return $new;
    }


}

