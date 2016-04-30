<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Market\Orders\BuyObject;
use OpenCrest\Objects\Market\Orders\SellObject;
use OpenCrest\Objects\Market\OrdersObject;

class RegionsObject extends Object
{
    protected $uri = "regions/";

    protected $relations = [
        "constellations"   => ConstellationsObject::class,
        "marketOrders"     => OrdersObject::class,
        "marketBuyOrders"  => BuyObject::class,
        "marketSellOrders" => SellObject::class,
    ];

}