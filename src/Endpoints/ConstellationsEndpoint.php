<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\ConstellationsObject;

class ConstellationsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "constellations/";

    /**
     * @param $item
     * @return ConstellationsObject
     */
    protected function make($item)
    {
        $instance = new ConstellationsObject();
        $instance->id = (isset($item['id']) ? $item['id'] : null); // Probably bug, that id isn't provided *in constellation*
        $instance->name = (isset($item['name']) ? $item['name'] : null); // Probably bug, that name isn't provided *in system*
        $instance->position = (isset($item['position']) ? $item['position'] : null); // Probably bug, that position isn't provided *in system*
        $instance->region = (isset($item['region']) ? $item['region'] : null); // Probably bug, that region isn't provided *in system*
        $instance->systems = (isset($item['systems']) ? SystemsEndpoint::createObject($item['systems']) : null); // Systems aren't provided *in system* so, we have to do all this differently

        return $instance;
    }
}