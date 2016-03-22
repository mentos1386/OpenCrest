<?php

namespace OpenCrest\Endpoints\Market\Orders;

use OpenCrest\Endpoints\Market\Endpoint;
use OpenCrest\Objects\Market\Orders\BuyObject;

class BuyEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "orders/buy/";
    /**
     * @var string
     */
    public $object = BuyObject::class;
}