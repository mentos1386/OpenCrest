<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\CapsuleerObject;

class CapsuleerEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "capsuleer/";
    /**
     * @var string
     */
    public $object = CapsuleerObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}