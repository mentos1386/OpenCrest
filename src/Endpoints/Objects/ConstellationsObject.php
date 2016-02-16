<?php namespace OpenCrest\Endpoints\Objects;

class ConstellationsObject extends AbstractObject
{
    /**
     * @var integer
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var array
     */
    public $position;
    /**
     * @var array
     */
    public $region;
    /**
     * @var array
     */
    public $systems;
    /**
     * @var string
     */
    public $href;
}