<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\AlliancesObject;

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