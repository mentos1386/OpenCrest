<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\ConstellationsObject;

class ConstellationsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "constellations/";

    /**
     * @var string
     */
    public $object = ConstellationsObject::class;

}