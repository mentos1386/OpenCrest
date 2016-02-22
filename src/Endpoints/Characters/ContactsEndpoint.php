<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\ContactsObject;

class ContactsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/contacts/";
    /**
     * @var string
     */
    public $object = ContactsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}