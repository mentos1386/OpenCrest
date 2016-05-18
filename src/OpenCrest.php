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
use OpenCrest\Objects\Corporations\LoyaltyStoreObject;
use OpenCrest\Objects\CorporationsObject;
use OpenCrest\Objects\CrestObject;
use OpenCrest\Objects\DogmaObject;
use OpenCrest\Objects\FleetsObject;
use OpenCrest\Objects\InsurancePricesObject;
use OpenCrest\Objects\Inventory\CategoriesObject;
use OpenCrest\Objects\Market\OrdersObject;
use OpenCrest\Objects\MarketObject;
use OpenCrest\Objects\MoonsObject;
use OpenCrest\Objects\Opportunities\GroupsObject;
use OpenCrest\Objects\Opportunities\TasksObject;
use OpenCrest\Objects\OpportunitiesObject;
use OpenCrest\Objects\PlanetsObject;
use OpenCrest\Objects\RacesObject;
use OpenCrest\Objects\RegionsObject;
use OpenCrest\Objects\StandingsObject;
use OpenCrest\Objects\SolarSystemsObject;
use OpenCrest\Objects\StargatesObject;
use OpenCrest\Objects\Systems\CampaignsObject;
use OpenCrest\Objects\Systems\StructuresObject;
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
     * CREST base
     *
     * @var string
     */
    private static $crestBase = "https://crest-tq.eveonline.com/";
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
    public static function getCrestBase()
    {
        return self::$crestBase;
    }

    /**
     * Change public CREST base
     *  - Shortcut "sisi" sets public base to Singularity server
     *
     * @param string $crestBase
     */
    public static function setCrestBase($crestBase)
    {
        if ($crestBase == "sisi") {
            $crestBase = "https://crest-sisi.testeveonline.com/";
        }
        self::$crestBase = $crestBase;
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
     * @return SolarSystemsObject
     */
    public static function SolarSystems()
    {
        return new SolarSystemsObject();
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
     * @param int $regionId
     * @return OrdersObject
     */
    public static function Orders(int $regionId)
    {
        return new  OrdersObject($regionId);
    }

    /**
     * @param int $corporationId
     * @return LoyaltyStoreObject
     */
    public static function LoyaltyStore(int $corporationId)
    {
        return new  LoyaltyStoreObject($corporationId);
    }

    /**
     * @return OpportunitiesObject
     */
    public static function Opportunities()
    {
        return new  OpportunitiesObject();
    }

    /**
     * @return GroupsObject
     */
    public static function OpportunitiesGroups()
    {
        return new  GroupsObject();
    }

    /**
     * @return TasksObject
     */
    public static function OpportunitiesTasks()
    {
        return new  TasksObject();
    }

    /**
     * @return InsurancePricesObject
     */
    public static function InsurancePrices()
    {
        return new  InsurancePricesObject();
    }

    /**
     * @return UniverseObject
     */
    public static function Universe()
    {
        return new  UniverseObject();
    }

    /**
     * @return FleetsObject
     */
    public static function Fleets()
    {
        return new  FleetsObject();
    }

    /**
     * @return MoonsObject
     */
    public static function Moons()
    {
        return new  MoonsObject();
    }

    /**
     * @return StargatesObject
     */
    public static function Stargates()
    {
        return new  StargatesObject();
    }

    /**
     * @return CampaignsObject
     */
    public static function SovereigntyCampaigns()
    {
        return new  CampaignsObject();
    }

    /**
     * @return StructuresObject
     */
    public static function SovereigntyStructures()
    {
        return new  StructuresObject();
    }

    /**
     * @return \OpenCrest\Objects\Inventory\CategoriesObject
     */
    public static function InventoryCategories()
    {
        return new  CategoriesObject();
    }


    /**
     * @return CrestObject
     */
    public static function status()
    {
        return (new CrestObject())->get();
    }
}