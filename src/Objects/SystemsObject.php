<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\ConstellationsEndpoint;
use OpenCrest\Endpoints\PlanetsEndpoint;
use OpenCrest\Endpoints\Systems\StatsEndpoint;

class SystemsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "constellation" => ConstellationsEndpoint::class,
            "sovereignty"   => AlliancesEndpoint::class,
            "stats"         => StatsEndpoint::class,
            "planets"       => PlanetsEndpoint::class,

        ];
    }
}