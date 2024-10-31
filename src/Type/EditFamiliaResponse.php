<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditFamiliaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditFamiliaResult = null;

    /**
     * @return string
     */
    public function getEditFamiliaResult()
    {
        return $this->EditFamiliaResult;
    }

    /**
     * @param string $EditFamiliaResult
     * @return EditFamiliaResponse
     */
    public function withEditFamiliaResult($EditFamiliaResult)
    {
        $new = clone $this;
        $new->EditFamiliaResult = $EditFamiliaResult;

        return $new;
    }


}

