<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\ConstellationsObject;

class ConstellationsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "constellations/";

    protected function setObject()
    {
        self::$object = new ConstellationsObject();
    }
}