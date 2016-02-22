<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\WaypointsObject;

class WaypointsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/navigation/waypoints/";
    /**
     * @var string
     */
    public $object = WaypointsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

}