<?php

namespace OpenCrest\Endpoints\Dogma;

use OpenCrest\Objects\Dogma\EffectsObject;

class EffectsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "effects/";
    /**
     * @var string
     */
    public $object = EffectsObject::class;
}