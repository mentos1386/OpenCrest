<?php

namespace OpenCrest\Objects\Fleets;

use OpenCrest\Objects\CharactersObject;
use OpenCrest\Objects\SolarSystemsObject;
use OpenCrest\Objects\StationsObject;
use OpenCrest\Objects\TypesObject;

class MembersObject extends Object
{
    protected $uri = "members/";

    protected $relations = [
        "solarSystem" => SolarSystemsObject::class,
        "character"   => CharactersObject::class,
        "station"     => StationsObject::class,
        "ship"        => TypesObject::class,
    ];
}