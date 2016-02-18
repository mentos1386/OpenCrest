<?php

namespace OpenCrest\Endpoints\Objects;

class Object
{

    public function toJson()
    {
        return json_encode($this->toArray(), true);
    }

    public function toArray()
    {
        return (array)$this;
    }
}