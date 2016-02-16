<?php namespace OpenCrest\Endpoints\Objects;

class RegionsObject extends AbstractObject
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
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $href;
    /**
     * @var array
     */
    public $constellations;
    /**
     * @var array
     */
    public $marketBuyOrders;
    /**
     * @var array
     */
    public $marketSellOrders;

}