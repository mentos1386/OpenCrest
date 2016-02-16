<?php namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\ListObject;
use OpenCrest\Endpoints\Objects\RegionsObject;

class RegionsEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "regions/";

    /**
     * GET ALL Regions
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
     * GET SPECIFIC Region
     *
     * @param $id
     * @return RegionsObject
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

        return $content;
    }

    /**
     * GET SPECIFIC Page with Regions
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

        $content = $this->parseAll($content);

        return $content;
    }

    /**
     * @param $item
     * @return RegionsObject
     */
    public static function createObject($item)
    {
        $instance = new RegionsObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->description = $item['description'];
        $instance->marketBuyOrders = $item['marketBuyOrders'];
        $instance->marketSellOrders = $item['marketSellOrders'];
        $instance->constellations = (object)ConstellationsEndpoint::createObjectAll($item['constellations']);

        return $instance;
    }

    /**
     * @param $items
     * @return RegionsObject
     */
    public static function createObjectAll($items)
    {
        $objects = [];
        foreach ($items as $item) {
            $instance = new RegionsObject();
            $instance->id = $item['id'];
            $instance->name = $item['name'];
            $instance->href = $item['href'];
            array_push($objects, $instance);
        }

        return $objects;
    }
}