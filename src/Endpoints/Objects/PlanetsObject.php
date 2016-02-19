<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\SystemsEndpoint;

class PlanetsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "system" => new SystemsEndpoint(),
        ];
    }
}