<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class DownloadImagesResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $DownloadImagesResult = null;

    /**
     * @return string
     */
    public function getDownloadImagesResult()
    {
        return $this->DownloadImagesResult;
    }

    /**
     * @param string $DownloadImagesResult
     * @return DownloadImagesResponse
     */
    public function withDownloadImagesResult($DownloadImagesResult)
    {
        $new = clone $this;
        $new->DownloadImagesResult = $DownloadImagesResult;

        return $new;
    }


}

