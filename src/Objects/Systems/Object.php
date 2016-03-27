<?php

namespace OpenCrest\Objects\Systems;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId)
    {
        parent::__construct($relationId);

        $this->uri = "solarsystems/" . $this->relationId . "/" . $this->uri;
    }
}