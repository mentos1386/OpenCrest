<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\SystemsObject;

class SystemsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "solarsystems/";

    protected function setObject()
    {
        self::$object = new SystemsObject();
    }
}