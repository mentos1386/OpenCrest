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
    public static function createObject($item)
    {
        $instance = new CorporationsObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->logo = $item['logo'];
        $instance->isNPC = $item['isNPC'];
        $instance->href = $item['href'];

        return $instance;
    }

    /**
     * @param $items
     * @return CorporationsObject
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