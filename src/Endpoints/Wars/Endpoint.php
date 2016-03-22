<?php

namespace OpenCrest\Endpoints\Wars;

class Endpoint extends \OpenCrest\Endpoints\Endpoint
{
    /**
     * We modify URI to better suit Endpoints
     *
     * @param int|null $relationId
     */
    public function __construct($relationId)
    {
        parent::__construct($relationId);

        $this->uri = "wars/" . $this->relationId . "/" . $this->uri;
    }
}