<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\CharactersObject;

class CharactersEndpoint extends Endpoint
{
    /**
     * @param $item
     * @return CharactersObject
     */
    public static function createObject($item)
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

    /**
     * @param $items
     * @return CharactersObject
     */
    public static function createObjectAll($items)
    {
        $objects = [];
        foreach ($items as $item) {
            array_push($objects, self::createObject($item));
        }

        return $objects;
    }
}