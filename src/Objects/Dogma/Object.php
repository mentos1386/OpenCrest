<?php

namespace OpenCrest\Objects\Dogma;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = null)
    {
        parent::__construct($relationId);

        $this->uri = "dogma/" . $this->uri;
    }
}