<?php

namespace OpenCrest\Endpoints\Objects\Dogma;

use OpenCrest\Endpoints\Dogma\AttributesEndpoint;
use OpenCrest\Endpoints\Objects\Object;

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