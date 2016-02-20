<?php

namespace OpenCrest;

use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\ConstellationsEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\CrestEndpoint;
use OpenCrest\Endpoints\PlanetsEndpoint;
use OpenCrest\Endpoints\RegionsEndpoint;
use OpenCrest\Endpoints\SystemsEndpoint;
use OpenCrest\Endpoints\TypesEndpoint;
use OpenCrest\Endpoints\WarsEndpoint;

class OpenCrest
{
    /**
     * @var null|string
     */
    protected static $apiVersion = "v3";
    /**
     * @var string
     */
    protected static $version = "1.0";
    /**
     * @var TypesEndpoint
     */
    public $types;
    /**
     * @var RegionsEndpoint
     */
    public $regions;
    /**
     * @var ConstellationsEndpoint
     */
    public $constellations;
    /**
     * @var SystemsEndpoint
     */
    public $systems;
    /**
     * @var PlanetsEndpoint
     */
    public $planets;
    /**
     * @var AlliancesEndpoint
     */
    public $alliances;
    /**
     * @var CharactersEndpoint
     */
    public $characters;
    /**
     * @var CorporationsEndpoint
     */
    public $corporations;
    /**
     * @var CrestEndpoint
     */
    public $crest;
    /**
     * @var WarsEndpoint
     */
    public $wars;
    /**
     * @var string
     */
    protected $token;

    /**
     * OpenCrest constructor.
     *
     * @param $token
     * @param $apiVersion
     */
    public function __construct($token = "", $apiVersion = null)
    {
        $this->token = $token;

        $this->alliances = new AlliancesEndpoint($token);
        $this->characters = new CharactersEndpoint($token);
        $this->corporations = new CorporationsEndpoint($token);
        $this->types = new TypesEndpoint($token);
        $this->regions = new RegionsEndpoint($token);
        $this->constellations = new ConstellationsEndpoint($token);
        $this->systems = new SystemsEndpoint($token);
        $this->planets = new PlanetsEndpoint($token);
        $this->crest = new CrestEndpoint($token);
        $this->wars = new WarsEndpoint($token);

        if ($apiVersion) {
            self::$apiVersion = $apiVersion;
        }
    }

    /**
     * @return null|string
     */
    public static function apiVersion()
    {
        return self::$apiVersion;
    }

    /**
     * @return string
     */
    public static function version()
    {
        return self::$version;
    }

    /**
     * @return Endpoints\Objects\ListObject
     */
    public static function status()
    {
        return (new CrestEndpoint())->all();
    }
}