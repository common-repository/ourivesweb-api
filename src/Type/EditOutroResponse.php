<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditOutroResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditOutroResult = null;

    /**
     * @return string
     */
    public function getEditOutroResult()
    {
        return $this->EditOutroResult;
    }

    /**
     * @param string $EditOutroResult
     * @return EditOutroResponse
     */
    public function withEditOutroResult($EditOutroResult)
    {
        $new = clone $this;
        $new->EditOutroResult = $EditOutroResult;

        return $new;
    }


}

