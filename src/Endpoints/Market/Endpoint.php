<?php

namespace OpenCrest\Endpoints\Market;

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

        $this->uri = "market/" . $this->relationId . "/" . $this->uri;
    }
}