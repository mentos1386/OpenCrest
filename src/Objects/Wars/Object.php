<?php

namespace OpenCrest\Objects\Wars;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "wars/" . $this->relationId . "/" . $this->uri;
    }
}