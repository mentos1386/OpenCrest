<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\TypesObject;

class TypesEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "types/";

    protected function setObject()
    {
        self::$object = new TypesObject();
    }
}