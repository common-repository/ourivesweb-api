<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class EditArtigoResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $EditArtigoResult = null;

    /**
     * @return string
     */
    public function getEditArtigoResult()
    {
        return $this->EditArtigoResult;
    }

    /**
     * @param string $EditArtigoResult
     * @return EditArtigoResponse
     */
    public function withEditArtigoResult($EditArtigoResult)
    {
        $new = clone $this;
        $new->EditArtigoResult = $EditArtigoResult;

        return $new;
    }


}

