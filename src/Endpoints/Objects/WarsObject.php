<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\CorporationsEndpoint;

class WarsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "aggressor" => CorporationsEndpoint::class,
            "defender"  => CorporationsEndpoint::class
        ];
    }
}