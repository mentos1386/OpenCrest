<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\ConstellationsEndpoint;

class SystemsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "Constellations" => ConstellationsEndpoint::class,
            "sovereignty"    => AlliancesEndpoint::class,
        ];
    }
}