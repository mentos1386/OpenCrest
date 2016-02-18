<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\PlanetsObject;

class PlanetsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "planets/";

    protected function setObject()
    {
        self::$object = new PlanetsObject();
    }
}