<?php

namespace OpenCrest\Endpoints\Market;

class Endpoint extends \OpenCrest\Endpoints\Endpoint
{
    /**
     *
     */
    protected function optionalConfig()
    {
        $this->uri = "market/" . $this->relationId . "/" . $this->uri;
    }
}