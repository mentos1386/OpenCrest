<?php

namespace OpenCrest\Objects\Corporations;

use OpenCrest\Objects\TypesObject;

class LoyaltyStoreObject extends Object
{
    protected $uri = "loyaltystore/";

    protected $relations = [
        "item" => TypesObject::class,
    ];
}