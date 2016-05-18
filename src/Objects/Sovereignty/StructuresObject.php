<?php

namespace OpenCrest\Objects\Systems;

use OpenCrest\Objects\AlliancesObject;
use OpenCrest\Objects\SolarSystemsObject;
use OpenCrest\Objects\TypesObject;

class StructuresObject extends Object
{
    protected $uri = "structures/";

    protected $relations = [
        "alliance"    => AlliancesObject::class,
        "solarSystem" => SolarSystemsObject::class,
        "type"        => TypesObject::class,
    ];
}