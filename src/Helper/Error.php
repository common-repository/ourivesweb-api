<?php

namespace OurivesWeb\Helper;

use Exception;

class Error extends Exception
{
    /** @var array */
    private $request;

    /**
     * Throws a new error with a message and a log from the last request made
     * @param $message
     * @param bool $request
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message, $type = "warning", $request = false, $code = 0, Exception $previous = null)
    {
        SweetAlert::AnimatedNotify($type, $message);

        parent::__construct($message, $code, $previous);

    }

    public function getError()
    {
        ob_start();
        $this->showError();
        return ob_get_clean();
    }

    public function showError()
    {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $message = $this->getDecodedMessage();
        wp_enqueue_style('Style_Error_modal', plugins_url('assets/css/Error.css', OURIVES_FILE));
        include OURIVES_TEMPLATE_DIR . 'Messages/DocumentError.php';
    }

    /**
     * Returns the default error message from construct
     * Or tries to translate the error from OurivesWeb API
     * @return string
     */
    public function getDecodedMessage()
    {
        $errorMessage = '<b>' . $this->getMessage() . '</b>';
        return $errorMessage;
    }

    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param string $message
     * @return string
     */
    private function translateMessage($message)
    {
        return $message;
    }
}