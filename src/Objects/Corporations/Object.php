<?php

namespace OpenCrest\Objects\Corporations;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "corporations/" . $relationId . "/" . $this->uri;
    }
}