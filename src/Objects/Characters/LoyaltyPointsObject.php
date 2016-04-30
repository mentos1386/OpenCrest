<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Objects\CorporationsObject;

class LoyaltyPointsObject extends Object
{
    protected $uri = "loyaltypoints/";

    protected $oauth = TRUE;

    protected $relations = [
        "corporation" => CorporationsObject::class,
    ];
}