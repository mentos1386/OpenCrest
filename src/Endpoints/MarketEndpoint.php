<?php

namespace OpenCrest\Endpoints;

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
}