<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditFornecedorResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditFornecedorResult = null;

    /**
     * @return string
     */
    public function getEditFornecedorResult()
    {
        return $this->EditFornecedorResult;
    }

    /**
     * @param string $EditFornecedorResult
     * @return EditFornecedorResponse
     */
    public function withEditFornecedorResult($EditFornecedorResult)
    {
        $new = clone $this;
        $new->EditFornecedorResult = $EditFornecedorResult;

        return $new;
    }


}

