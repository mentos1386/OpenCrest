<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\CharactersObject;

class CharactersEndpoint extends Endpoint
{
    /**
     * @param $item
     * @return CharactersObject
     */
    protected function make($item)
    {
        $instance = new CharactersObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->isNPC = $item['isNPC'];
        $instance->capsuleer = $item['capsuleer'];
        $instance->portrait = $item['portrait'];
        $instance->href = $item['href'];

        return $instance;
    }

}