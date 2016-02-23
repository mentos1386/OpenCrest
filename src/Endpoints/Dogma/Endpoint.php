<?php

namespace OpenCrest\Endpoints\Dogma;

class Endpoint extends \OpenCrest\Endpoints\Endpoint
{
    /**
     *
     */
    protected function optionalConfig()
    {
        $this->uri = "dogma/" . $this->uri;
    }
}