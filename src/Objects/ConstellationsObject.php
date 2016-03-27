<?php

namespace OpenCrest\Objects;

class ConstellationsObject extends Object
{
    public $uri = "constellations/";

    protected $relations = [
        "systems" => SystemsObject::class,
        "region"  => RegionsObject::class,
    ];
}