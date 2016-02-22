<?php

namespace OpenCrest\Exceptions;

class RouteException extends \Exception
{
    protected $message = "Route not in use for this Endpoint";
}