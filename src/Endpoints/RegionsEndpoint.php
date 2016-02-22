<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\RegionsObject;

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