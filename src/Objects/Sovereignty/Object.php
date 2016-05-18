<?php

namespace OpenCrest\Objects\Sovereignty;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "sovereignty/" . $this->uri;
    }
}