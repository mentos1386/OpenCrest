<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Objects\Opportunities\TasksObject;

class OpportunitiesObject extends Object
{
    protected $uri = "opportunities/";

    protected $oauth = TRUE;

    protected $relations = [
        "task" => TasksObject::class,
    ];
}