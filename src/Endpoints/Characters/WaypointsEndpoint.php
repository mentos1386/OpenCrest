<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\WaypointsObject;
use OpenCrest\Endpoints\Objects\Object;
use OpenCrest\Endpoints\Objects\SystemsObject;
use OpenCrest\Endpoints\SystemsEndpoint;
use OpenCrest\Exceptions\PostDataException;

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