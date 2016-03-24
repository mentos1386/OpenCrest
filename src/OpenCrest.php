<?php

namespace OpenCrest;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use OpenCrest\Endpoints\AccountsEndpoint;
use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\BloodLinesEndpoint;
use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\ConstellationsEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\CrestEndpoint;
use OpenCrest\Endpoints\DogmaEndpoint;
use OpenCrest\Endpoints\MarketEndpoint;
use OpenCrest\Endpoints\PlanetsEndpoint;
use OpenCrest\Endpoints\RacesEndpoint;
use OpenCrest\Endpoints\RegionsEndpoint;
use OpenCrest\Endpoints\StandingsEndpoint;
use OpenCrest\Endpoints\SystemsEndpoint;
use OpenCrest\Endpoints\TournamentsEndpoint;
use OpenCrest\Endpoints\TypesEndpoint;
use OpenCrest\Endpoints\UniverseEndpoint;
use OpenCrest\Endpoints\WarsEndpoint;
use OpenCrest\Objects\CrestObject;

class OpenCrest
{
    /**
     * @var array
     */
    public static $asyncRequestsPublic = [];
    /**
     * @var array
     */
    public static $asyncEndpointsPublic = [];
    /**
     * @var array
     */
    public static $asyncResponsesPublic = [];
    /**
     * @var array
     */
    public static $asyncRequestsOauth = [];
    /**
     * @var array
     */
    public static $asyncEndpointsOauth = [];
    /**
     * @var array
     */
    public static $asyncResponsesOauth = [];

    /**
     * @var Promise
     */
    public static $asyncPromisePublic;
    /**
     * @var Promise
     */
    public static $asyncPromiseOauth;
    /**
     * @var bool
     */
    public static $async = False;
    /**
     * Crest api version selection
     *  - Dosen't work atm
     *
     * @var null|string
     */
    protected static $apiVersion = "v3";
    /**
     * OpenCrest version
     *
     * @var string
     */
    protected static $version = "2.0.2";
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
     *
     */
    static public function asyncRun()
    {
        // We set up the arrays
        self::$asyncResponsesPublic["success"] = [];
        self::$asyncResponsesPublic["rejected"] = [];
        self::$asyncResponsesOauth["success"] = [];
        self::$asyncResponsesOauth["rejected"] = [];

        // Create new GuzzleHttp Clients for Public and Oauth
        $clientPublic = new Client(self::headers());
        $clientOauth = new Client(self::headers(true));

        // Public
        $poolPublic = new Pool($clientPublic, self::$asyncRequestsPublic, [
            "concurrency" => 20,
            "fulfilled"   => function (Response $response, $index) {
                $response = json_decode($response->getBody()->getContents(), true);

                array_push(self::$asyncResponsesPublic["success"], self::$asyncEndpointsPublic[$index]->createObject($response));
            },
            "rejected"    => function ($reason, $index) {
                array_push(self::$asyncResponsesPublic["rejected"], ["reason" => $reason, "index" => $index]);
            }
        ]);

        self::$asyncPromisePublic = $poolPublic->promise();
        self::$asyncPromisePublic->wait();

        // Oauth
        $poolOauth = new Pool($clientOauth, self::$asyncRequestsOauth, [
            "concurrency" => 20,
            "fulfilled"   => function (Response $response, $index) {
                $response = json_decode($response->getBody()->getContents(), true);

                array_push(self::$asyncResponsesOauth["success"], self::$asyncEndpointsOauth[$index]->createObject($response));
            },
            "rejected"    => function ($reason, $index) {
                array_push(self::$asyncResponsesOauth["rejected"], ["reason" => $reason, "index" => $index]);
            }
        ]);

        self::$asyncPromiseOauth = $poolOauth->promise();
        self::$asyncPromiseOauth->wait();
    }

    /**
     * We create Public and Auth headers for CREST
     *
     * @param bool $oauth
     * @return array
     */
    public static function headers($oauth = False)
    {
        if ($oauth) {
            $headers = [
                'base_uri' => OpenCrest::getOauthBase(),
                'headers'  => [
                    'User-Agent'    => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'        => 'application/vnd.ccp.eve.Api-' . OpenCrest::getApiVersion() . '+json; charset=utf-8',
                    'Authorization' => 'Bearer ' . OpenCrest::$token,
                ]
            ];
        } else {
            $headers = [
                'base_uri' => OpenCrest::getPublicBase(),
                'headers'  => [
                    'User-Agent' => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'     => 'application/vnd.ccp.eve.Api-' . OpenCrest::getApiVersion() . '+json; charset=utf-8',
                ]
            ];
        }

        return $headers;
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
     * Set OAUTH token, used for Authentication when connecting to endpoint on OAuth base
     *
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
     * @return RacesEndpoint
     */
    public static function Races()
    {
        return new RacesEndpoint();
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
     * @return MarketEndpoint
     */
    public static function Market()
    {
        return new  MarketEndpoint();
    }

    /**
     * @return UniverseEndpoint
     */
    public static function Universe()
    {
        return new  UniverseEndpoint();
    }

    /**
     * @return CrestObject
     */
    public static function status()
    {
        return (new CrestEndpoint())->get();
    }
}