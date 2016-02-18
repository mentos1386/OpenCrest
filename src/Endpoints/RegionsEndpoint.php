<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\RegionsObject;

class RegionsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "regions/";

    protected function setObject()
    {
        self::$object = new RegionsObject();
    }
}