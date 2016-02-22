<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\CharactersObject;

class CharactersEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "characters/";
    public $object = CharactersObject::class;
    protected $oauth = True;
    /**
     * @var array
     */
    protected $routes = [
        "show",
    ];

    public function standings()
    {
    }
}