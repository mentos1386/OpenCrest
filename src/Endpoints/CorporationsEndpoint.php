<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\CorporationsObject;

class CorporationsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "corporations/";

    /**
     * @var string
     */
    public $object = CorporationsObject::class;

}