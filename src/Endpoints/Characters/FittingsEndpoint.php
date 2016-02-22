<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Endpoints\Objects\Characters\FittingsObject;

class FittingsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "/fittings/";
    /**
     * @var string
     */
    public $object = FittingsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;
}