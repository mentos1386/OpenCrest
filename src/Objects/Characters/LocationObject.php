<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Objects\SystemsObject;

class LocationObject extends Object
{
    protected $uri = "location/";

    protected $oauth = TRUE;

    protected $relations = [
        "solarSystem" => SystemsObject::class,
    ];
}