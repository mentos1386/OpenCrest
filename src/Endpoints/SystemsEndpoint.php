<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\SystemsObject;

class SystemsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "solarsystems/";

    /**
     * @param $item
     * @return SystemsObject
     */
    protected function make($item)
    {
        $instance = new SystemsObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->position = $item['position'];
        $instance->securityStatus = $item['securityStatus'];
        $instance->securityClass = $item['securityClass'];
        $instance->constellation = ConstellationsEndpoint::createObject($item['constellation']);
        $instance->planets = $item['planets'];

        //$instance->sovereignty = AlliancesEndpoint::createObject($item['sovereignty']);TODO There should be some check, to see what data is provided.

        return $instance;
    }

}