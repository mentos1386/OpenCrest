<?php namespace OpenCrest\Endpoints\Objects;

class AlliancesObject extends AbstractObject
{
    public $endpoint;
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
    public $shortName;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $startDate;
    /**
     * @var integer
     */
    public $corporationsCount;
    /**
     * @var CorporationsObject
     */
    public $executorCorporation;
    /**
     * @var CharactersObject
     */
    public $creatorCharacter;
    /**
     * @var CorporationsObject
     */
    public $creatorCorporation;
    /**
     * @var CorporationsObject
     */
    public $corporations;
    /**
     * @var string
     */
    public $href;
    /**
     * @var string
     */
    public $url;
    /**
     * @var boolean
     */
    public $deleted;
}