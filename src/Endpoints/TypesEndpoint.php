<?php namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\TypesObject;
use OpenCrest\Endpoints\Objects\ListObject;

class TypesEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "types/";

    /**
     * GET ALL Types
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
     * GET SPECIFIC Type
     *
     * @param $id
     * @return TypesObject
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

        return $content;
    }

    /**
     * GET SPECIFIC Page with Types
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
     * @return TypesObject
     */
    public static function createObject($item)
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

    /**
     * @param $items
     * @return TypesObject
     */
    public static function createObjectAll($items)
    {
        $objects = [];
        foreach ($items as $item) {
            $instance = new TypesObject();
            $instance->id = $item['id'];
            $instance->name = $item['name'];
            $instance->href = $item['href'];
            array_push($objects, $instance);
        }

        return $objects;
    }
}