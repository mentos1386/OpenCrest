<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Objects\Object;
use OpenCrest\Endpoints\SystemsEndpoint;

class LocationObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "solarSystem" => SystemsEndpoint::class,
        ];
    }
}