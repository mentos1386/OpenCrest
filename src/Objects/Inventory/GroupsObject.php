<?php

namespace OpenCrest\Objects\Inventory;

use OpenCrest\Objects\TypesObject;

class GroupsObject
{
    protected $uri = "groups/";

    protected $relations = [
        "types"    => TypesObject::class,
        "category" => CategoriesObject::class,
    ];
}