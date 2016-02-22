<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\AccountsObject;

class AccountsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "accounts/";
    /**
     * @var string
     */
    public $object = AccountsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}