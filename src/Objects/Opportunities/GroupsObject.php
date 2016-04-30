<?php

namespace OpenCrest\Objects\Opportunities;

class GroupsObject extends Object
{
    protected $uri = "groups/";

    protected $relations = [
        "achievementTasks" => TasksObject::class,
        "groupConnections" => GroupsObject::class,
    ];
}