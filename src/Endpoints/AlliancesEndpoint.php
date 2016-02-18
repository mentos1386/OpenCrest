<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\AlliancesObject;

class AlliancesEndpoint extends Endpoint
{

    /**
     * @var string
     */
    public $uri = "alliances/";

    protected function setObject()
    {
        self::$object = new AlliancesObject();
    }
}