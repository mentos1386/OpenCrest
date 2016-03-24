<?php

namespace OpenCrest\Endpoints\Market\Orders;

use OpenCrest\Endpoints\Market\Endpoint;
use OpenCrest\Objects\Market\OrdersObject;

class SellEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "orders/sell/";
    /**
     * @var string
     */
    public $object = OrdersObject::class;
}