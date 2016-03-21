<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\CrestObject;

class CrestEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "";

    /**
     * @var string
     */
    public $object = CrestObject::class;
}