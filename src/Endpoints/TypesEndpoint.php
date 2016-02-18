<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\TypesObject;

class TypesEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "types/";

    /**
     * @param $item
     * @return TypesObject
     */
    protected function make($item)
    {
        $instance = new TypesObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->description = $item['description'];
        $instance->capacity = $item['capacity'];
        $instance->mass = $item['mass'];
        $instance->radius = $item['radius'];
        $instance->dogma = $item['dogma'];
        $instance->portionSize = $item['portionSize'];
        $instance->published = $item['published'];

        return $instance;
    }
}