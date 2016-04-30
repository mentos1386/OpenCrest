<?php

namespace OpenCrest\Objects;

class StargatesObject extends Object
{
    protected $uri = "stargates/";

    protected $relations = [
        "type"   => TypesObject::class,
        "system" => SolarSystemsObject::class,
    ];
}