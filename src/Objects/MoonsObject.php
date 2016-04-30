<?php

namespace OpenCrest\Objects;

class MoonsObject extends Object
{
    protected $uri = "moons/";

    protected $relations = [
        "type"        => TypesObject::class,
        "solarSystem" => SolarSystemsObject::class,
    ];
}