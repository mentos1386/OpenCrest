<?php

namespace OpenCrest\Objects\Opportunities;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "opportunities/" . $this->uri;
    }
}