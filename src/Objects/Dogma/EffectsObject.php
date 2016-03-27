<?php

namespace OpenCrest\Objects\Dogma;

class EffectsObject extends Object
{
    protected $uri = "effects/";

    protected $relations = [
        "dischargeAttributeID" => AttributesObject::class,
        "durationAttributeID"  => AttributesObject::class,
    ];
}