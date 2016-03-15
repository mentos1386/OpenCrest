<?php

namespace OpenCrest\Endpoints\Systems;
class Endpoint extends \OpenCrest\Endpoints\Endpoint
{
    /**
     *
     */
    protected function optionalConfig()
    {
        $this->uri = "solarsystems/" . $this->relationId . "/" . $this->uri;
    }
}