<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\AlliancesObject;

class AlliancesEndpoint extends Endpoint
{

    /**
     * @var string
     */
    public $uri = "alliances/";

    /**
     * @var string
     */
    public $object = AlliancesObject::class;

}