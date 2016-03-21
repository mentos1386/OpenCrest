<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Objects\Characters\PrivateObject;

class PrivateEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "private/";
    /**
     * @var string
     */
    public $object = PrivateObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

}