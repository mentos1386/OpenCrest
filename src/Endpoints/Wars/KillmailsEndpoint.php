<?php

namespace OpenCrest\Endpoints\Wars;

use OpenCrest\Objects\Wars\KillmailsObject;

class KillmailsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "killmails/all/";
    /**
     * @var string
     */
    public $object = KillmailsObject::class;
}