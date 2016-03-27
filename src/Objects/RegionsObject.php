<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Market\Orders\BuyObject;
use OpenCrest\Objects\Market\Orders\SellObject;

class RegionsObject extends Object
{
    protected $uri = "regions/";

    protected $relations = [
        "constellations"   => ConstellationsObject::class,
        "marketBuyOrders"  => BuyObject::class,
        "marketSellOrders" => SellObject::class,
    ];

}