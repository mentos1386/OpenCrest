<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\TournamentsObject;

class TournamentsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "tournaments/";

    /**
     * @var string
     */
    public $object = TournamentsObject::class;
}