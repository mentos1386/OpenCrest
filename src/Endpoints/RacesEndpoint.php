<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\RacesObject;

class RacesEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "races/";

    /**
     * @var string
     */
    public $object = RacesObject::class;
}