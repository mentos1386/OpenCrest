<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\ListObject;
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
     * GET ALL Systems
     *
     * @return ListObject
     */
    public function all()
    {
        $uri = $this->uri;

        $content = $this->get($uri);

        $content = $this->parseAll($content, new $this);

        return $content;
    }


    /**
     * GET SPECIFIC Systems
     *
     * @param $id
     * @return SystemsObject
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

        return $content;
    }

    /**
     * GET SPECIFIC Page with Systems
     *
     * @param $id
     * @return ListObject
     */
    public function page($id)
    {
        $uri = $this->uri;

        $content = $this->get($uri, [
            'query' => 'page=' . $id
        ]);

        $content = $this->parseAll($content, new $this);

        return $content;
    }

    /**
     * @param $item
     * @return SystemsObject
     */
    public static function createObject($item)
    {
        $instance = new SystemsObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->position = $item['position'];
        $instance->securityStatus = $item['securityStatus'];
        $instance->securityClass = $item['securityClass'];
        $instance->constellation = ConstellationsEndpoint::createObject($item['constellation']);
        $instance->planets = $item['planets'];
        //$instance->sovereignty = AlliancesEndpoint::createObject($item['sovereignty']); There should be some check, to see what data is provided. TODO

        return $instance;
    }

    /**
     * @param $items
     * @return SystemsObject
     */
    public static function createObjectAll($items)
    {
        $objects = [];
        foreach ($items as $item) {
            $instance = new SystemsObject();
            $instance->id = $item['id'];
            $instance->href = $item['href'];
            array_push($objects, $instance);
        }

        return $objects;
    }
}