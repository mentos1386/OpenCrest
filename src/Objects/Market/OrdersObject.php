<?php

namespace OpenCrest\Objects\Market;

use OpenCrest\Objects\TypesObject;
use OpenCrest\Objects\Universe\LocationsObject;

class OrdersObject extends Object
{
    protected $uri = "orders/";

    protected $relations = [
        "location" => LocationsObject::class,
        "type"     => TypesObject::class,
    ];
}