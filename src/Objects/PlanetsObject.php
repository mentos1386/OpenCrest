<?php

namespace OpenCrest\Objects;

class PlanetsObject extends Object
{
    protected $uri = "planets/";

    protected $relations = [
        "solarSystem" => SolarSystemsObject::class,
        "type"        => TypesObject::class,
    ];
}