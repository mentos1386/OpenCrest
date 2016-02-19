<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\ConstellationsEndpoint;

class RegionsObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "Constellations" => new ConstellationsEndpoint(),
        ];
    }

}