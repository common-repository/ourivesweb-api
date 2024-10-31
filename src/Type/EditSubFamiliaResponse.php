<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditSubFamiliaResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditSubFamiliaResult = null;

    /**
     * @return string
     */
    public function getEditSubFamiliaResult()
    {
        return $this->EditSubFamiliaResult;
    }

    /**
     * @param string $EditSubFamiliaResult
     * @return EditSubFamiliaResponse
     */
    public function withEditSubFamiliaResult($EditSubFamiliaResult)
    {
        $new = clone $this;
        $new->EditSubFamiliaResult = $EditSubFamiliaResult;

        return $new;
    }


}

