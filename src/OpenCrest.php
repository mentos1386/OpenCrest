<?php

namespace OpenCrest;

use OpenCrest\Interfaces\EndpointInterface;
use OpenCrest\Interfaces\FactoryInterface;
use OpenCrest\Interfaces\ObjectInterface;
use OpenCrest\Objects\AccountsObject;
use OpenCrest\Objects\AlliancesObject;
use OpenCrest\Objects\BloodLinesObject;
use OpenCrest\Objects\CharactersObject;
use OpenCrest\Objects\ConstellationsObject;
use OpenCrest\Objects\CorporationsObject;
use OpenCrest\Objects\CrestObject;
use OpenCrest\Objects\DogmaObject;
use OpenCrest\Objects\MarketObject;
use OpenCrest\Objects\PlanetsObject;
use OpenCrest\Objects\RacesObject;
use OpenCrest\Objects\RegionsObject;
use OpenCrest\Objects\StandingsObject;
use OpenCrest\Objects\SystemsObject;
use OpenCrest\Objects\TournamentsObject;
use OpenCrest\Objects\TypesObject;
use OpenCrest\Objects\UniverseObject;
use OpenCrest\Objects\WarsObject;

class OpenCrest
{
    /**
     * Determines if requests should be made Asynchronously (Forced to use OpenCrest provided Endpoint)
     *
     * @var bool
     */
    public static $async = FALSE;
    /**
     * Crest api version selection
     *
     * @var string
     */
    private static $apiVersion = "v3";
    /**
     * OpenCrest version
     *
     * @var string
     */
    private static $version = "3.0.0-beta";
    /**
     * Oauth Token
     *
     * @var string
     */
    private static $token;
    /**
     * Public CREST base
     *
     * @var string
     */
    private static $publicBase = "https://public-crest.eveonline.com/";
    /**
     * OAuth CREST base
     *
     * @var string
     */
    private static $oauthBase = "https://crest-tq.eveonline.com/";
    /**
     * OAuth Login url
     * Only used for ease of access, not used by library
     *
     * @var string
     */
    private static $oauthLogin = "https://login.eveonline.com/";
    /**
     * Endpoint used for getting data
     *
     * @var EndpointInterface
     */
    private static $endpoint = Endpoint::class;
    /**
     * Factory used for processing data
     *
     * @var FactoryInterface
     */
    private static $factory = Factory::class;

    /**
     * @return FactoryInterface
     */
    public static function getFactory()
    {
        return new self::$factory;
    }

    /**
     * @param FactoryInterface $factory
     */
    public static function setFactory(FactoryInterface $factory)
    {
        self::$factory = $factory;
    }

    /**
     * @param ObjectInterface $object
     * @return EndpointInterface
     */
    public static function getEndpoint(ObjectInterface $object)
    {
        return new self::$endpoint($object);
    }

    /**
     * @param EndpointInterface $endpoint
     */
    public static function setEndpoint(EndpointInterface $endpoint)
    {
        self::$endpoint = $endpoint;
    }


    /**
     * @return string
     */
    public static function getOauthBase()
    {
        return self::$oauthBase;
    }

    /**
     * Change Oauth CREST base
     *  - Shortcut "sisi" sets Oauth base to Singularity server
     *
     * @param string $oauthBase
     */
    public static function setOauthBase($oauthBase)
    {
        if ($oauthBase == "sisi") {
            $oauthBase = "https://api-sisi.testeveonline.com/";
        }
        self::$oauthBase = $oauthBase;
    }

    /**
     * @return string
     */
    public static function version()
    {
        return self::$version;
    }

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
    public static function getPublicBase()
    {
        return self::$publicBase;
    }

    /**
     * Change public CREST base
     *  - Shortcut "sisi" sets public base to Singularity server
     *
     * @param string $publicBase
     */
    public static function setPublicBase($publicBase)
    {
        if ($publicBase == "sisi") {
            $publicBase = "http://public-crest-sisi.testeveonline.com/";
        }
        self::$publicBase = $publicBase;
    }

    /**
     * @return string
     */
    public static function getOauthLogin()
    {
        return self::$oauthLogin;
    }

    /**
     * Change oauthLogin url, only used for ease of access, not used by library
     *
     * @param string $oauthLogin
     */
    public static function setOauthLogin($oauthLogin)
    {
        if ($oauthLogin == "sisi") {
            $oauthLogin = " https://sisilogin.testeveonline.com/";
        }
        self::$oauthLogin = $oauthLogin;
    }

    /**
     * @return string
     */
    public static function getToken()
    {
        return self::$token;
    }

    /**
     * Set OAUTH token, used for Authentication when connecting to Object on OAuth base
     *
     * @param string $token
     * @return mixed
     */
    public static function setToken($token)
    {
        return self::$token = $token;
    }

    /**
     * @return AlliancesObject
     */
    public static function Alliances()
    {
        return new AlliancesObject();
    }

    /**
     * @return CharactersObject
     */
    public static function Characters()
    {
        return new CharactersObject();
    }

    /**
     * @return CorporationsObject
     */
    public static function Corporations()
    {
        return new CorporationsObject();
    }

    /**
     * @return TypesObject
     */
    public static function Types()
    {
        return new TypesObject();
    }

    /**
     * @return RacesObject
     */
    public static function Races()
    {
        return new RacesObject();
    }

    /**
     * @return RegionsObject
     */
    public static function Regions()
    {
        return new RegionsObject();
    }

    /**
     * @return ConstellationsObject
     */
    public static function Constellations()
    {
        return new ConstellationsObject();
    }

    /**
     * @return SystemsObject
     */
    public static function Systems()
    {
        return new SystemsObject();
    }

    /**
     * @return PlanetsObject
     */
    public static function Planets()
    {
        return new PlanetsObject();
    }

    /**
     * @return CrestObject
     */
    public static function Crest()
    {
        return new CrestObject();
    }

    /**
     * @return WarsObject
     */
    public static function Wars()
    {
        return new WarsObject();
    }

    /**
     * @return BloodLinesObject
     */
    public static function Bloodlines()
    {
        return new BloodLinesObject();
    }

    /**
     * @return StandingsObject
     */
    public static function Standings()
    {
        return new StandingsObject();
    }

    /**
     * @return AccountsObject
     */
    public static function Accounts()
    {
        return new AccountsObject();
    }

    /**
     * @return TournamentsObject
     */
    public static function Tournaments()
    {
        return new TournamentsObject();
    }

    /**
     * @return DogmaObject
     */
    public static function Dogma()
    {
        return new  DogmaObject();
    }

    /**
     * @return MarketObject
     */
    public static function Market()
    {
        return new  MarketObject();
    }

    /**
     * @return UniverseObject
     */
    public static function Universe()
    {
        return new  UniverseObject();
    }

    /**
     * @return CrestObject
     */
    public static function status()
    {
        return (new CrestObject())->get();
    }
}