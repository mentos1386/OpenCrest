<?php

namespace OpenCrest\Objects\Market\Orders;

use OpenCrest\Objects\Market\Object;
use OpenCrest\Objects\TypesObject;
use OpenCrest\Objects\Universe\LocationsObject;

class BuyObject extends Object
{
    protected $uri = "orders/buy/";

    protected $listUri = "orders/";

    protected $relations = [
        "location" => LocationsObject::class,
        "type"     => TypesObject::class,
    ];
}