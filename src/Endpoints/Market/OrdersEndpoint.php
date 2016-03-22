<?php

namespace OpenCrest\Endpoints\Dogma;

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

    /**
     * @param int $relationsId
     * @return AttributesEndpoint
     */
    public function Buy($relationsId)
    {
        return new AttributesEndpoint($relationsId);
    }

    /**
     * @param int $relationsId
     * @return EffectsEndpoint
     */
    public function Sell($relationsId)
    {
        return new EffectsEndpoint($relationsId);
    }
}