<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;

class AlliancesObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "executorCorporation" => new CorporationsEndpoint(),
            "creatorCorporation"  => new CorporationsEndpoint(),
            "corporations"        => new CorporationsEndpoint(),
            "creatorCharacter"    => new CharactersEndpoint(),
        ];
    }
}