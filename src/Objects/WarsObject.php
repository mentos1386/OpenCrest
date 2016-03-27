<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Wars\KillmailsObject;

class WarsObject extends Object
{
    protected $uri = "wars/";

    protected $relations = [
        "aggressor" => CorporationsObject::class,
        "defender"  => CorporationsObject::class,
        "killmails" => KillmailsObject::class,
    ];
}