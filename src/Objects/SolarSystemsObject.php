<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Systems\StatsObject;

class SolarSystemsObject extends Object
{
    protected $uri = "solarsystems/";

    protected $relations = [
        "constellation" => ConstellationsObject::class,
        "sovereignty"   => AlliancesObject::class,
        "stats"         => StatsObject::class,
        "planets"       => PlanetsObject::class,
        "stargates"     => StargatesObject::class,
    ];
}