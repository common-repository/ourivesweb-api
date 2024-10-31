<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditClienteResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditClienteResult = null;

    /**
     * @return string
     */
    public function getEditClienteResult()
    {
        return $this->EditClienteResult;
    }

    /**
     * @param string $EditClienteResult
     * @return EditClienteResponse
     */
    public function withEditClienteResult($EditClienteResult)
    {
        $new = clone $this;
        $new->EditClienteResult = $EditClienteResult;

        return $new;
    }


}

