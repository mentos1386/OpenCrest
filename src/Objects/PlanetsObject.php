<?php

namespace OpenCrest\Objects;

class PlanetsObject extends Object
{
    protected $uri = "planets/";

    protected $relations = [
        "system" => SystemsObject::class,
    ];
}