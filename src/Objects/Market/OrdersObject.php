<?php

namespace OpenCrest\Objects\Market;

use OpenCrest\Endpoints\Market\OrdersEndpoint;
use OpenCrest\Endpoints\TypesEndpoint;
use OpenCrest\Endpoints\Universe\LocationsEndpoint;
use OpenCrest\Objects\Object;

class OrdersObject extends Object
{
    /**
     * ListObject's items have different Endpoint than ListObejct
     *
     * @var OrdersEndpoint
     */
    protected $listEndpoint = OrdersEndpoint::class;

    protected function setRelations()
    {
        $this->relations = [
            "location" => LocationsEndpoint::class,
            "type"     => TypesEndpoint::class,
        ];
    }
}