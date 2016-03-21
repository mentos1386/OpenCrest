<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\TournamentsObject;

class TournamentsEndpoint extends Endpoint
{
    // TODO: Id isn't provided when listing Tournaments, only HREF, we could use HREF instead ID to get resources?

    /**
     * @var string
     */
    public $uri = "tournaments/";

    /**
     * @var string
     */
    public $object = TournamentsObject::class;
}