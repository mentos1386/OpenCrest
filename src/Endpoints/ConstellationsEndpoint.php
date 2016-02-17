<?php namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\ConstellationsObject;
use OpenCrest\Endpoints\Objects\ListObject;

class ConstellationsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "constellations/";

    /**
     * GET ALL Constellations
     *
     * @return ListObject
     */
    public function all()
    {
        $uri = $this->uri;

        $content = $this->get($uri);

        $content = $this->parseAll($content);

        return $content;
    }


    /**
     * GET SPECIFIC Constellation
     *
     * @param $id
     * @return ConstellationsObject
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

        return $content;
    }

    /**
     * GET SPECIFIC Page with Constellations
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
     * @return ConstellationsObject
     */
    public static function createObject($item)
    {
        $instance = new ConstellationsObject();
        $instance->id = (isset($item['id'])? $item['id'] : null); // Probably bug, that id isn't provided *in constellation*
        $instance->name = (isset($item['name'])? $item['name'] : null); // Probably bug, that name isn't provided *in system*
        $instance->position = (isset($item['position'])? $item['position'] : null); // Probably bug, that position isn't provided *in system*
        $instance->region = (isset($item['region'])? $item['region'] : null); // Probably bug, that region isn't provided *in system*
        $instance->systems = (isset($item['systems'])? SystemsEndpoint::createObjectAll($item['systems']) : null); // Probably bug, that id isn't provided *in system*

        return $instance;
    }

    /**
     * @param $items
     * @return ConstellationsObject
     */
    public static function createObjectAll($items)
    {
        $objects = [];
        foreach ($items as $item) {
            $instance = new ConstellationsObject();
            $instance->id = (isset($item['id'])? $item['id'] : null); // Probably bug, that id isn't provided *in systems*
            $instance->name = (isset($item['name'])? $item['name'] : null); // Probably bug, that name isn't provided *in regions*
            $instance->href = (isset($item['href'])? $item['href'] : null); // Probably bug, that href isn't provided *in systems*
            array_push($objects, $instance);
        }

        return $objects;
    }
}