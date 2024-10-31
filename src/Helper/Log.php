<?php

namespace OurivesWeb\Helper;

use RuntimeException;

class Log
{

    private static $fileName = false;

    public static function phpCreateFile($name)
    {
        try {
            if (!is_dir(OURIVES_DIR . '/logs') && !mkdir($concurrentDirectory = OURIVES_DIR . '/logs') && !is_dir($concurrentDirectory)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            $message = file_get_contents(OURIVES_DIR . '/src/Views/' . "Template.html");
            $logFile = fopen(OURIVES_DIR . '/logs/' . $name, 'ab');
            fwrite($logFile, $message . PHP_EOL);
            return $name;
        } catch (RuntimeException $exception) {

        }


    }

    public static function getPhpFile($fileName)
    {
        return OURIVES_URL . 'logs/' . $fileName;
    }

    public static function phpWrite($fileName, $message)
    {
        try {
            if (!is_dir(OURIVES_DIR . '/logs') && !mkdir($concurrentDirectory = OURIVES_DIR . '/logs') && !is_dir($concurrentDirectory)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }

            $logFile = fopen(OURIVES_DIR . '/logs/' . $fileName, 'ab');
            fwrite($logFile, $message . PHP_EOL);
        } catch (RuntimeException $exception) {

        }

    }


    public static function write($message)
    {
        try {
            if (!is_dir(OURIVES_DIR . '/logs') && !mkdir($concurrentDirectory = OURIVES_DIR . '/logs') && !is_dir($concurrentDirectory)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }

            $fileName = (self::$fileName ? self::$fileName . '.log' : date('Y-m-d__H')) . '.log';

            $logFile = fopen(OURIVES_DIR . '/logs/' . $fileName, 'ab');
            fwrite($logFile, '[' . date('Y-m-d H:i:s') . '] ' . $message . '<br/>' . PHP_EOL);
        } catch (RuntimeException $exception) {

        }
    }

    public static function removeLogs()
    {
        $logFiles = glob(OURIVES_DIR . '/logs/*');
        if (!empty($logFiles) && is_array($logFiles)) {
            foreach ($logFiles as $file) {
                unlink($file);
            }
        }
    }

    public static function setFileName($name)
    {
        if (!empty($name)) {
            self::$fileName = $name;
        }
    }

}
