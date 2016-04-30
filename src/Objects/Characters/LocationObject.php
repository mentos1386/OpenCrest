<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Objects\StationsObject;
use OpenCrest\Objects\SolarSystemsObject;

class LocationObject extends Object
{
    protected $uri = "location/";

    protected $oauth = TRUE;

    protected $relations = [
        "solarSystem" => SolarSystemsObject::class,
        "station"     => StationsObject::class,
    ];
}