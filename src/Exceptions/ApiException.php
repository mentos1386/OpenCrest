<?php

namespace OpenCrest\Exceptions;

class ApiException extends Exception
{
    /**
     * @return string
     */
    public function errorMessage()
    {
        return "API Encountered an error! Message: " . $this->response;
    }
}