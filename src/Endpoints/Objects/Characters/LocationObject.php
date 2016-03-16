<?php

namespace OpenCrest\Endpoints\Objects\Characters;

use OpenCrest\Endpoints\Objects\Object;
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