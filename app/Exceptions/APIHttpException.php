<?php

namespace App\Exceptions;

use Exception;

class APIHttpException extends Exception
{
    protected $statusCode = 400;
    protected $message = 'Something went wrong';
    public function __construct($message = null)
    {
        if (!$message) {
            $message = $this->message;
        }
        parent::__construct($message, $this->statusCode);
    }
}
