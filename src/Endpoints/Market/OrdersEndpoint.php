<?php

namespace OpenCrest\Endpoints\Market;

use OpenCrest\Objects\Market\OrdersObject;

class OrdersEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "orders/";
    /**
     * @var string
     */
    public $object = OrdersObject::class;

}