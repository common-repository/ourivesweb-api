<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditVendedorResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditVendedorResult = null;

    /**
     * @return string
     */
    public function getEditVendedorResult()
    {
        return $this->EditVendedorResult;
    }

    /**
     * @param string $EditVendedorResult
     * @return EditVendedorResponse
     */
    public function withEditVendedorResult($EditVendedorResult)
    {
        $new = clone $this;
        $new->EditVendedorResult = $EditVendedorResult;

        return $new;
    }


}

