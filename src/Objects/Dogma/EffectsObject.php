<?php

namespace OpenCrest\Objects\Dogma;

use OpenCrest\Endpoints\Dogma\AttributesEndpoint;
use OpenCrest\Objects\Object;

class EffectsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "dischargeAttributeID" => AttributesEndpoint::class,
            "durationAttributeID"  => AttributesEndpoint::class,
        ];
    }
}