<?php namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\AlliancesObject;
use OpenCrest\Endpoints\Objects\ListObject;

class AlliancesEndpoint extends Endpoint
{

    public $uri = "alliances/";

    protected $oauth = False;

    public function all()
    {
        $uri = $this->uri;

        $content = $this->client->get($uri)->getBody()->getContents();

        $content = $this->parseAll($content);

        return $content;
    }



    public function get($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->client->get($uri)->getBody()->getContents();

        $content = $this->createObject($content);

        return $content;
    }

    public function page($id)
    {
        $uri = $this->uri;

        $content = $this->client->get($uri, [
            'query' => 'page='.$id
            ])->getBody()->getContents();

        $content = $this->parseAll($content);

        return $content;
    }

    /**
     * This is must have in every Endpoint, this is used to create objects in functions like paresAll()
     *
     * @param $items
     * @return AlliancesObject
     */
    public function createObjectAll($items)
    {
        $objects = [];
        foreach($items as $item){
            $instance = new AlliancesObject();
            $instance->id = $item['id'];
            $instance->name = $item['name'];
            $instance->shortName = $item['shortName'];
            $instance->href = $item['href'];
            array_push($objects, $instance);
        }

        return $objects;
    }

}