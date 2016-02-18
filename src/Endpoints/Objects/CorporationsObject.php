<?php

namespace OpenCrest\Endpoints\Objects;

class CorporationsObject extends Object
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
    public $logo;
    /**
     * @var boolean
     */
    public $isNPC;
    /**
     * @var string
     */
    public $href;

}