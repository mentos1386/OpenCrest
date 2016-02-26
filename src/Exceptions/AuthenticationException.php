<?php

namespace OpenCrest\Exceptions;

class AuthenticationException extends Exception
{
    /**
     * @var int
     */
    protected $code = 401;

    /**
     * @return string
     */
    protected function errorMessage()
    {
        return "Authentication problem! Message: " . $this->response;
    }
}