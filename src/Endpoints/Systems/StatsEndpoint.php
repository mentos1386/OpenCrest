<?php

namespace OpenCrest\Endpoints\Systems;

use OpenCrest\Objects\Systems\StatsObject;

class StatsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "stats/";
    /**
     * @var string
     */
    public $object = StatsObject::class;
}