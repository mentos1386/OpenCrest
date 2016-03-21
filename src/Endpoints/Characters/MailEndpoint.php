<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Objects\Characters\MailObject;

class MailEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "mail/";
    /**
     * @var string
     */
    public $object = MailObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}