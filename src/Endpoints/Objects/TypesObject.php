<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\DogmaEndpoint;

class TypesObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "dogma" => DogmaEndpoint::class
        ];
    }
}