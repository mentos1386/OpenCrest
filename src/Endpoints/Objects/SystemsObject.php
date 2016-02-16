<?php namespace OpenCrest\Endpoints\Objects;

class SystemsObject extends AbstractObject
{
    /**
     * @var integer
     */
    public $id;
    /**
     * @var array
     */
    public $stats;
    /**
     * @var string
     */
    public $name;
    /**
     * @var float
     */
    public $securityStatus;
    /**
     * @var string
     */
    public $securityClass;
    /**
     * @var array
     */
    public $planets;
    /**
     * @var array
     */
    public $position;
    /**
     * @var array
     */
    public $sovereignty;
    /**
     * @var ConstellationsObject
     */
    public $constellation;
    /**
     * @var string
     */
    public $href;
}