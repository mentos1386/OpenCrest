<?php

namespace OpenCrest\Objects;

class TypesObject extends Object
{
    protected $uri = "types/";

    protected $relations = [
        "dogma" => DogmaObject::class
    ];
}