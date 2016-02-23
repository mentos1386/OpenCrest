<?php

namespace OpenCrest\Endpoints\Dogma;

use OpenCrest\Endpoints\Objects\Dogma\AttributesObject;

class AttributesEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "attributes/";
    /**
     * @var string
     */
    public $object = AttributesObject::class;
}