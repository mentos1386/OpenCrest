<?php

namespace OpenCrest\Exceptions;

class RouteNotFoundException extends Exception
{
    /**
     * @var int
     */
    protected $code = 404;

    /**
     * @return string
     */
    public function errorMessage()
    {
        return "Route not found! Message: " . $this->response;
    }
}