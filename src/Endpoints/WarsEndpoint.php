<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\WarsObject;

class WarsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "wars/";

    /**
     * @var string
     */
    public $object = WarsObject::class;

}