<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class UpLoadImageResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $UpLoadImageResult = null;

    /**
     * @return string
     */
    public function getUpLoadImageResult()
    {
        return $this->UpLoadImageResult;
    }

    /**
     * @param string $UpLoadImageResult
     * @return UpLoadImageResponse
     */
    public function withUpLoadImageResult($UpLoadImageResult)
    {
        $new = clone $this;
        $new->UpLoadImageResult = $UpLoadImageResult;

        return $new;
    }


}

