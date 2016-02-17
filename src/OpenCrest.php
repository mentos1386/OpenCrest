<?php

namespace OpenCrest;

use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\ConstellationsEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\PlanetsEndpoint;
use OpenCrest\Endpoints\RegionsEndpoint;
use OpenCrest\Endpoints\SystemsEndpoint;
use OpenCrest\Endpoints\TypesEndpoint;

class OpenCrest
{
    protected $token;
    protected static $apiVersion = "v3";
    protected static $version = "0.1";

    // Endpoints
    public $alliances;
    public $characters;
    public $corporations;
    public $types;
    public $regions;
    public $constellations;
    public $systems;
    public $planets;

    /**
     * OpenCrest constructor.
     *
     * @param $token
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

        if ($apiVersion)
        {
            self::$apiVersion = $apiVersion;
        }
    }

    public static function apiVersion()
    {
        return self::$apiVersion;
    }

    public static function version()
    {
        return self::$version;
    }
}