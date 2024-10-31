<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditMarcaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditMarcaResult = null;

    /**
     * @return string
     */
    public function getEditMarcaResult()
    {
        return $this->EditMarcaResult;
    }

    /**
     * @param string $EditMarcaResult
     * @return EditMarcaResponse
     */
    public function withEditMarcaResult($EditMarcaResult)
    {
        $new = clone $this;
        $new->EditMarcaResult = $EditMarcaResult;

        return $new;
    }


}

