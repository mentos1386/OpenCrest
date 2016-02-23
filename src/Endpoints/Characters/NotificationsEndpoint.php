<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\NotificationsObject;

class NotificationsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "notifications/";
    /**
     * @var string
     */
    public $object = NotificationsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

}