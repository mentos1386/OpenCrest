<?php

namespace OpenCrest;

use OpenCrest\Endpoints\AccountsEndpoint;
use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\BloodLinesEndpoint;
use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\ConstellationsEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\CrestEndpoint;
use OpenCrest\Endpoints\DogmaEndpoint;
use OpenCrest\Endpoints\Objects\CrestObject;
use OpenCrest\Endpoints\PlanetsEndpoint;
use OpenCrest\Endpoints\RegionsEndpoint;
use OpenCrest\Endpoints\StandingsEndpoint;
use OpenCrest\Endpoints\SystemsEndpoint;
use OpenCrest\Endpoints\TournamentsEndpoint;
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
    protected static $version = "2.0.2";
    /**
     * @var string
     */
    private static $token;

    /**
     * @return null|string
     */
    public static function getApiVersion()
    {
        return self::$apiVersion;
    }

    /**
     * @param string $apiVersion
     */
    public static function setApiVersion($apiVersion)
    {
        self::$apiVersion = $apiVersion;
    }

    /**
     * @return string
     */
    public static function getToken()
    {
        return self::$token;
    }

    /**
     * @param string $token
     * @return mixed
     */
    public static function setToken($token)
    {
        return self::$token = $token;
    }

    /**
     * @return AlliancesEndpoint
     */
    public static function Alliances()
    {
        return new AlliancesEndpoint();
    }

    /**
     * @return CharactersEndpoint
     */
    public static function Characters()
    {
        return new CharactersEndpoint();
    }

    /**
     * @return CorporationsEndpoint
     */
    public static function Corporations()
    {
        return new CorporationsEndpoint();
    }

    /**
     * @return TypesEndpoint
     */
    public static function Types()
    {
        return new TypesEndpoint();
    }

    /**
     * @return RegionsEndpoint
     */
    public static function Regions()
    {
        return new RegionsEndpoint();
    }

    /**
     * @return ConstellationsEndpoint
     */
    public static function Constellations()
    {
        return new ConstellationsEndpoint();
    }

    /**
     * @return SystemsEndpoint
     */
    public static function Systems()
    {
        return new SystemsEndpoint();
    }

    /**
     * @return PlanetsEndpoint
     */
    public static function Planets()
    {
        return new PlanetsEndpoint();
    }

    /**
     * @return CrestEndpoint
     */
    public static function Crest()
    {
        return new CrestEndpoint();
    }

    /**
     * @return WarsEndpoint
     */
    public static function Wars()
    {
        return new WarsEndpoint();
    }

    /**
     * @return BloodLinesEndpoint
     */
    public static function Bloodlines()
    {
        return new BloodLinesEndpoint();
    }

    /**
     * @return StandingsEndpoint
     */
    public static function Standings()
    {
        return new StandingsEndpoint();
    }

    /**
     * @return AccountsEndpoint
     */
    public static function Accounts()
    {
        return new AccountsEndpoint();
    }

    /**
     * @return TournamentsEndpoint
     */
    public static function Tournaments()
    {
        return new TournamentsEndpoint();
    }

    /**
     * @return DogmaEndpoint
     */
    public static function Dogma()
    {
        return new  DogmaEndpoint();
    }

    /**
     * @return string
     */
    public static function version()
    {
        return self::$version;
    }

    /**
     * @return CrestObject
     */
    public static function status()
    {
        return (new CrestEndpoint())->get();
    }
}