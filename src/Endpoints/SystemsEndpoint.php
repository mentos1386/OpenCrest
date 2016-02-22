<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\SystemsObject;

class SystemsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "solarsystems/";

    /**
     * @var string
     */
    public $object = SystemsObject::class;
}