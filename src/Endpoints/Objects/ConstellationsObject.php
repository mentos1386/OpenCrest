<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\SystemsEndpoint;

class ConstellationsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "systems" => SystemsEndpoint::class,
        ];
    }
}