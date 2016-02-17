<?php

namespace OpenCrest\Endpoints\Objects;

class AbstractObject
{

    public function toArray()
    {
        return (array)$this;
    }

    public function toJson()
    {
        return json_encode($this->toArray(), true);
    }
}