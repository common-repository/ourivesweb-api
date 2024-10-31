<?php

namespace OurivesWeb;

use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Symfony\Component\EventDispatcher\EventDispatcher;

class OurivesWebClientFactory
{

    public static function factory(string $wsdl): OurivesWebClient
    {
        $engine = ExtSoapEngineFactory::fromOptions(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(OurivesWebClassmap::getCollection())
        );
        $eventDispatcher = new EventDispatcher();

        return new OurivesWebClient($engine, $eventDispatcher);
    }


}

