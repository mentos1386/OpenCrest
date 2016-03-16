<?php

namespace OpenCrest\Exceptions;

class PostDataException extends Exception
{
    /**
     * @var int
     */
    protected $code = 415;

    /**
     * @return string
     */
    protected function errorMessage()
    {
        return "Wrong data supplied for POST method on: " . $this->response;
    }
}