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
        return "Route not found! (It may be implemented in the future) Message: " . $this->response;
    }
}