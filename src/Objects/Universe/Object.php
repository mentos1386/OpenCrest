<?php

namespace OpenCrest\Objects\Universe;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "universe/" . $this->uri;
    }
}