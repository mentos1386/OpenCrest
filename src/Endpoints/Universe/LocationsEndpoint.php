<?php

namespace OpenCrest\Endpoints\Universe;

use OpenCrest\Objects\Universe\LocationsObject;

class LocationsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "locations/";
    /**
     * @var string
     */
    public $object = LocationsObject::class;
}