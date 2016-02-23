<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Dogma\AttributesEndpoint;
use OpenCrest\Endpoints\Dogma\EffectsEndpoint;
use OpenCrest\Endpoints\Objects\DogmaObject;

class DogmaEndpoint extends Endpoint
{
    /**
     * Uri
     *
     * @var string
     */
    public $uri = "dogma/";

    /**
     * @var string
     */
    public $object = DogmaObject::class;

    /**
     * @return mixed|Object
     */
    public function Attributes()
    {
        return new AttributesEndpoint();
    }

    /**
     * @return mixed|Object
     */
    public function Effects()
    {
        return new EffectsEndpoint();
    }

}