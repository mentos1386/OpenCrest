<?php

namespace OpenCrest\Objects\Inventory;

class CategoriesObject extends Object
{
    protected $uri = "categories/";

    protected $relations = [
        "groups" => GroupsObject::class,
    ];
}