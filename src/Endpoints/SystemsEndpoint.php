<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\SystemsObject;

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