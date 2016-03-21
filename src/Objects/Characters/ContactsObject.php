<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Objects\Object;

class ContactsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "alliance"  => AlliancesEndpoint::class,
            "character" => CharactersEndpoint::class,
        ];
    }
}