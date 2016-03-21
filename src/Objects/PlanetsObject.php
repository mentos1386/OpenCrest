<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\SystemsEndpoint;

class PlanetsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "system" => SystemsEndpoint::class,
        ];
    }
}