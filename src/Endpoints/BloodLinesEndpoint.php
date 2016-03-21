<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Objects\BloodLinesObject;

class BloodLinesEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "bloodlines/";

    /**
     * @var string
     */
    public $object = BloodLinesObject::class;
}