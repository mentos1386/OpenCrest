<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\PlanetsObject;

class PlanetsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "planets/";

    /**
     * @param $item
     * @return PlanetsObject
     */
    protected function make($item)
    {
        $instance = new PlanetsObject();
        //$instance->id = $item['id'];  Not provided, probably bug
        $instance->name = $item['name'];
        $instance->type = $item['type'];

        //$instance->system = SystemsEndpoint::createObject($item['system']);TODO Not Enough data is provided, need to implement some check system

        return $instance;
    }
}