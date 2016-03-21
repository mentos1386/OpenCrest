<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\StandingsObject;

class StandingsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "standings/";

    /**
     * @var string
     */
    public $object = StandingsObject::class;

}