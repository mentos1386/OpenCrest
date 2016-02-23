<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\LocationObject;

class LocationEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "location/";
    /**
     * @var string
     */
    public $object = LocationObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}