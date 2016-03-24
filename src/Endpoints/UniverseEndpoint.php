<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\UniverseObject;

class UniverseEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "universe/";

    /**
     * @var string
     */
    public $object = UniverseObject::class;
}