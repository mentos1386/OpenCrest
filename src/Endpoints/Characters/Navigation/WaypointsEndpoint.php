<?php

namespace OpenCrest\Endpoints\Characters\Navigation;

use OpenCrest\Endpoints\Characters\Endpoint;
use OpenCrest\Objects\Characters\WaypointsObject;
use OpenCrest\Objects\SystemsObject;

class WaypointsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "navigation/waypoints/";
    /**
     * @var string
     */
    public $object = WaypointsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

    /**
     * @param SystemsObject $data
     * @return array
     */
    public function makePost($data)
    {
        return [
            // ClearOtherWaypoints attribute should be added on Object with Object->setAttribute("clearOtherWaypoints", Boolan);
            "clearOtherWaypoints" => $data->getAttribute("clearOtherWaypoints"),
            // First attribute should be added on Object with Object->setAttribute("first", Boolan);
            "first"               => $data->getAttribute("first"),
            "solarSystem"         => [
                "href" => $data->getAttribute("href"),
                "id"   => $data->getAttribute("id"),
            ],
        ];
    }
}