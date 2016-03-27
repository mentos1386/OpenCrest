<?php

namespace OpenCrest\Objects;

class AlliancesObject extends Object
{
    protected $uri = "alliances/";

    protected $relations = [
        "executorCorporation" => CorporationsObject::class,
        "creatorCorporation"  => CorporationsObject::class,
        "corporations"        => CorporationsObject::class,
        "creatorCharacter"    => CharactersObject::class,
        "capitalSystem"       => SystemsObject::class,
    ];
}