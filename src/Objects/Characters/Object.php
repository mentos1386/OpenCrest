<?php

namespace OpenCrest\Objects\Characters;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "characters/" . $this->relationId . "/" . $this->uri;
    }
}