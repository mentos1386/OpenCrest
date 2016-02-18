<?php

namespace OpenCrest\Endpoints;

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
     * @param $item
     * @return AlliancesObject
     */
    protected function make($item)
    {
        $instance = new AlliancesObject();
        $instance->endpoint = new self; // TODO: Would it be useful to have endpoint in object? For future relationship models?
        $instance->id = $item['id'];
        $instance->name = $item['name'];
        $instance->shortName = $item['shortName'];
        $instance->startDate = $item['startDate'];
        $instance->description = $item['description'];
        $instance->corporationsCount = $item['corporationsCount'];
        $instance->corporations = (object)CorporationsEndpoint::createObject($item['corporations']);
        $instance->executorCorporation = (object)CorporationsEndpoint::createObject($item['executorCorporation']);
        $instance->creatorCorporation = (object)CorporationsEndpoint::createObject($item['creatorCorporation']);
        $instance->creatorCharacter = (object)CharactersEndpoint::createObject($item['creatorCharacter']);
        $instance->url = $item['url'];
        $instance->deleted = $item['deleted'];

        return $instance;
    }
}