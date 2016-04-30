<?php

namespace OpenCrest\Objects\Fleets;

use OpenCrest\Objects\Fleets\Wings\SquadsObject;

class WingsObject extends Object
{
    protected $uri = "wings/";

    protected $relations = [
        "squadsList" => SquadsObject::class,
        "squads"     => SquadsObject::class,
    ];
}