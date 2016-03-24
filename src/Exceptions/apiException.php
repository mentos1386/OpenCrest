<?php

namespace OpenCrest\Exceptions;

class apiException extends Exception
{
    /**
     * @return string
     */
    public function errorMessage()
    {
        return "API Encountered an error! Message: " . $this->response;
    }
}