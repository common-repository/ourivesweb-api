<?php

namespace OurivesWeb\Type;


use Phpro\SoapClient\Type\ResultInterface;

class DownloadImageResponse implements ResultInterface
{

    /**
     * @var string
     */
    private $DownloadImageResult = null;

    /**
     * @return string
     */
    public function getDownloadImageResult()
    {
        return $this->DownloadImageResult;
    }

    /**
     * @param string $DownloadImageResult
     * @return DownloadImageResponse
     */
    public function withDownloadImageResult($DownloadImageResult)
    {
        $new = clone $this;
        $new->DownloadImageResult = $DownloadImageResult;

        return $new;
    }


}

