<?php

namespace OpenCrest\Objects;

class CrestObject extends Object
{

    public $uri = "";

    /**
     * @param $item
     * @return CharactersObject
     */
    public function make($item)
    {
        foreach ($item as $key => $value) {
            switch ($key) {
                // CrestObject is special case where we want only some information, not everything
                case "userCounts":
                case "serverVersion":
                case "serviceStatus":
                case "serverName":
                    $this->values[$key] = $value;
                    break;
            }
        }

        return $this;
    }
}