<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\WarsObject;

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