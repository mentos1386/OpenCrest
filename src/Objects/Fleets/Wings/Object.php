<?php

namespace OpenCrest\Objects\Fleets\Wings;

class Object extends \OpenCrest\Objects\Object
{
    protected $oauth = TRUE;

    function __construct(int $relationId = NULL)
    {
        parent::__construct($relationId);

        $fleetId = NULL; // TODO: How the heck do you get this?
        $wingId = $relationId;

        $this->uri = "fleets/" . $fleetId . "/wings" . $wingId . "/" . $this->uri;
    }

}