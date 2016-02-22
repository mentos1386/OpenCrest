<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\ChannelsObject;

class ChannelsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/chat/channels";
    /**
     * @var string
     */
    public $object = ChannelsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}