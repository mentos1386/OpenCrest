<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\VivoxObject;

class VivoxEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/vivox";
    /**
     * @var string
     */
    public $object = VivoxObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

}