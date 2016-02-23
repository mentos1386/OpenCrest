<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\Dogma\AttributesEndpoint;
use OpenCrest\Endpoints\Dogma\EffectsEndpoint;

class DogmaObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "attributes" => AttributesEndpoint::class,
            "effects"    => EffectsEndpoint::class,
        ];
    }
}