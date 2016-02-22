<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\BlockedObject;

class BlockedEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/blocked";
    /**
     * @var string
     */
    public $object = BlockedObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}