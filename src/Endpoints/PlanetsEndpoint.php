<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\ListObject;
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
     * GET ALL Planets
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
     * GET SPECIFIC Planet
     *
     * @param $id
     * @return PlanetsObject
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

        return $content;
    }

    /**
     * GET SPECIFIC Page with Planets
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
     * @return PlanetsObject
     */
    public static function createObject($item)
    {
        $instance = new PlanetsObject();
        //$instance->id = $item['id'];  Not provided, probably bug
        $instance->name = $item['name'];
        $instance->type = $item['type'];
        //$instance->system = SystemsEndpoint::createObject($item['system']); Not Enough data is provided, need to implement TODO

        return $instance;
    }

    /**
     * @param $items
     * @return PlanetsObject
     */
    public static function createObjectAll($items)
    {
        $objects = [];
        foreach ($items as $item) {
            $instance = new PlanetsObject();
            // Route /planets/ isn't available yet!
            array_push($objects, $instance);
        }

        return $objects;
    }
}