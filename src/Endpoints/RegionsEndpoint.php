<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\RegionsObject;

class RegionsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "regions/";

    /**
     * @param $item
     * @return RegionsObject
     */
    protected function make($item)
    {
        $instance = new RegionsObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->description = $item['description'];
        $instance->marketBuyOrders = $item['marketBuyOrders'];
        $instance->marketSellOrders = $item['marketSellOrders'];
        $instance->constellations = (object)ConstellationsEndpoint::createObject($item['constellations']);

        return $instance;
    }
}