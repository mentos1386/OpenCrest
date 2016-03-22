<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\Wars\KillmailsEndpoint;

class WarsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "aggressor" => CorporationsEndpoint::class,
            "defender"  => CorporationsEndpoint::class,
            "killmails" => KillmailsEndpoint::class,
        ];
    }
}