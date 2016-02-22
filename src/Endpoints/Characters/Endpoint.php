<?php

namespace OpenCrest\Endpoints\Characters;
class Endpoint extends \OpenCrest\Endpoints\Endpoint
{
    protected $optionalConfig = True;

    /**
     *
     */
    protected function optionalConfig()
    {
        $this->uri = "characters/" . $this->relationId . $this->uri;
    }
}