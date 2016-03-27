<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Dogma\AttributesObject;
use OpenCrest\Objects\Dogma\EffectsObject;

class DogmaObject extends Object
{
    protected $uri = "dogma/";

    protected $relations = [
        "attributes" => AttributesObject::class,
        "effects"    => EffectsObject::class,
    ];
}