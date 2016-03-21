<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\RegionsObject;

class RegionsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "regions/";

    /**
     * @var string
     */
    public $object = RegionsObject::class;

}