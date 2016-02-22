<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\PrivateObject;

class PrivateEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/private/";
    /**
     * @var string
     */
    public $object = PrivateObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

}