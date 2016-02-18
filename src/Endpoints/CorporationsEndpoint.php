<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\CorporationsObject;

class CorporationsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "corporations/";

    /**
     * @param $item
     * @return CorporationsObject
     */
    protected function make($item)
    {
        $instance = new CorporationsObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->logo = $item['logo'];
        $instance->isNPC = $item['isNPC'];
        $instance->href = $item['href'];

        return $instance;
    }
}