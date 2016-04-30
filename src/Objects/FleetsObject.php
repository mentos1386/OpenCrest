<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Fleets\MembersObject;
use OpenCrest\Objects\Fleets\WingsObject;

class FleetsObject extends Object
{
    protected $uri = "fleets/";

    protected $oauth = TRUE;

    protected $relations = [
        'members' => MembersObject::class,
        'wings'   => WingsObject::class,
    ];
}