<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\CharactersObject;

class CharactersEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "characters/";

    protected function setObject()
    {
        self::$object = new CharactersObject();
    }

}