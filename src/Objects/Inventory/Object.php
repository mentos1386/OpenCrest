<?php

namespace OpenCrest\Objects\Inventory;

class Object extends \OpenCrest\Objects\Object
{
    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "inventory/" . $this->uri;
    }
}