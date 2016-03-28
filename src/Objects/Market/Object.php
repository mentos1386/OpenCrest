<?php

namespace OpenCrest\Objects\Market;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "market/" . $this->uri;
    }
}