<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Objects\TypesObject;

class TypesEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "types/";

    /**
     * @var string
     */
    public $object = TypesObject::class;

}