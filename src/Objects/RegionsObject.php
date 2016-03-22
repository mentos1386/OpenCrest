<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\ConstellationsEndpoint;
use OpenCrest\Endpoints\Market\Orders\BuyEndpoint;
use OpenCrest\Endpoints\Market\Orders\SellEndpoint;

class RegionsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "constellations"   => ConstellationsEndpoint::class,
            "marketBuyOrders"  => BuyEndpoint::class,
            "marketSellOrders" => SellEndpoint::class,
        ];
    }

}