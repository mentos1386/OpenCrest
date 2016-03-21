<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\RegionsEndpoint;
use OpenCrest\Endpoints\SystemsEndpoint;

class ConstellationsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "systems" => SystemsEndpoint::class,
            "region"  => RegionsEndpoint::class,
        ];
    }
}