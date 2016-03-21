<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;

class AlliancesObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "executorCorporation" => CorporationsEndpoint::class,
            "creatorCorporation"  => CorporationsEndpoint::class,
            "corporations"        => CorporationsEndpoint::class,
            "creatorCharacter"    => CharactersEndpoint::class,
        ];
    }
}