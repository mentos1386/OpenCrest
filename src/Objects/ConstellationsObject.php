<?php

namespace OpenCrest\Objects;

class ConstellationsObject extends Object
{
    public $uri = "constellations/";

    protected $relations = [
        "systems" => SolarSystemsObject::class,
        "region"  => RegionsObject::class,
    ];
}