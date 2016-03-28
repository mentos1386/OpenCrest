<?php

namespace OpenCrest\Objects\Characters\Navigation;

use OpenCrest\Objects\Characters\Object;

class WaypointsObject extends Object
{
    protected $uri = "navigation/waypoints/";

    protected $oauth = TRUE;

    protected $pattern = [
        "clearOtherWaypoints" => "Reset other waypoints <boolan>",
        "first"               => "First waypoint <boolan>",
        "solarSystem"         => [
            "href" => "Href to Solar System <string>",
            "id"   => "ID of Solar System <int>",
        ]
    ];
}