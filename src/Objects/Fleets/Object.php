<?php

namespace OpenCrest\Objects\Fleets;

class Object extends \OpenCrest\Objects\Object
{
    protected $oauth = TRUE;

    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $this->uri = "fleets/" . $relationId . "/" . $this->uri;
    }

}