<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Market\OrdersEndpoint;
use OpenCrest\Objects\ListObject;
use OpenCrest\Objects\Market\OrdersObject;
use OpenCrest\Objects\MarketObject;

class MarketEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "market/";

    /**
     * @var string
     */
    public $object = MarketObject::class;

    /**
     * @param int $relationsId RegionID
     * @param int $id
     * @return OrdersObject|ListObject
     */
    public function getOrders($relationsId, $id = null)
    {
        return (new OrdersEndpoint($relationsId))->get($id);
    }
}