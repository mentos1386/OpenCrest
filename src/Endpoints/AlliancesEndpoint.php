<?php namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\AlliancesObject;

class AlliancesEndpoint extends Endpoint
{

    /**
     * Uri
     *
     * @var string
     */
    public $uri = "alliances/";

    /**
     * GET ALL Alliances
     *
     * @return mixed|Objects\ListObject
     */
    public function all()
    {
        $uri = $this->uri;

        $content = $this->get($uri);

        $content = $this->parseAll($content);

        return $content;
    }

    /**
     * GET SPECIFIC Alliance
     *
     * @param $id
     * @return mixed|Objects\AbstractObject|AlliancesObject
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

        return $content;
    }

    /**
     * GET SPECIFIC Page with Alliances
     *
     * @param $id
     * @return mixed|Objects\ListObject
     */
    public function page($id)
    {
        $uri = $this->uri;

        $content = $this->get($uri, [
            'query' => 'page='.$id
        ]);

        $content = $this->parseAll($content);

        return $content;
    }

    /**
     * @param $item
     * @return AlliancesObject
     */
    public static function createObject($item)
    {
        $instance = new AlliancesObject();
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->shortName = $item['shortName'];
        $instance->startDate = $item['startDate'];
        $instance->description = $item['description'];
        $instance->corporationsCount = $item['corporationsCount'];
        $instance->corporations = (object)CorporationsEndpoint::createObjectAll($item['corporations']);
        $instance->executorCorporation = (object)CorporationsEndpoint::createObject($item['executorCorporation']);
        $instance->creatorCorporation = (object)CorporationsEndpoint::createObject($item['creatorCorporation']);
        $instance->creatorCharacter = (object)CharactersEndpoint::createObject($item['creatorCharacter']);
        $instance->url = $item['url'];
        $instance->delete = $item['deleted'];

        return $instance;
    }

    /**
     * @param $items
     * @return AlliancesObject
     */
    public static function createObjectAll($items)
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