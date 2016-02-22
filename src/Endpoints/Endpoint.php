<?php

namespace OpenCrest\Endpoints;

use GuzzleHttp;
use OpenCrest\Endpoints\Objects\ListObject;
use OpenCrest\Exceptions\RouteException;
use OpenCrest\OpenCrest;

abstract class Endpoint
{
    /**
     * @var Objects\Object
     */
    public $object;
    /**
     * @var GuzzleHttp\Client
     */
    public $client;
    /**
     * @var string
     */
    public $uri;
    /**
     * TODO: Could this be moved to Object ?
     *
*@var array
     */
    protected $relationId;
    /**
     * @var bool
     */
    protected $oauth = False;
    /**
     * @var string
     */
    protected $token;
    /**
     * @var array
     */
    protected $routes = [
        "get",
        "show",
    ];
    /**
     * @var string
     */
    private $publicBase = "https://public-crest.eveonline.com/";
    /**
     * @var string
     */
    private $oauthBase = "https://crest-tq.eveonline.com/";

    /**
     * Endpoint constructor.
     *
     * @param integer $relationId
     */
    public function __construct($relationId = null)
    {
        $this->token = OpenCrest::token();
        $this->client = new GuzzleHttp\Client($this->headers());

        $this->relationId = $relationId;

        $this->optionalConfig();
    }

    /**
     * @return array
     */
    private function headers()
    {
        if ($this->oauth) {
            $headers = [
                'base_uri' => $this->oauthBase,
                'headers'  => [
                    'User-Agent'    => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'        => 'Accept: application/vnd.ccp.eve.Api-' . OpenCrest::apiVersion() . '+json',
                    'Authorization' => 'Bearer ' . $this->token,
                ]
            ];
        } else {
            $headers = [
                'base_uri' => $this->publicBase,
                'headers'  => [
                    'User-Agent' => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'     => 'Accept: application/vnd.ccp.eve.Api-' . OpenCrest::apiVersion() . '+json',
                ]
            ];
        }

        return $headers;
    }

    /**
     * This is used in some endpoints to add custom properties/functions in __constructor
     */
    protected function optionalConfig()
    {
    }

    /**
     * @return mixed|Object
     * @throws RouteException
     */
    public function get()
    {
        if (!array_key_exists("get", $this->routes)) {
        }
        $uri = $this->uri;
        $content = $this->httpGet($uri);
        $content = $this->createObject($content);

        return $content;
    }

    /**
     * @param       $uri
     * @param array $options
     * @return mixed
     */
    private function httpGet($uri, $options = [])
    {
        return json_decode($this->client->get($uri, $options)->getBody()->getContents(), true);
    }

    /**
     * @param $item
     * @return Object
     */
    public function createObject($item)
    {
        if (isset($item['items']) or isset($item[0])) {
            // If we have list of items
            $listObject = new ListObject();
            $listObject->setEndpoint(clone $this);

            return $listObject->make($item);
        } else {
            if (isset($item["id"])) {
                $id = $item['id'];
            } else {
                $id = null;
            }
            // If there is only one item
            $object = new $this->object($id);
            $object->setEndpoint(clone $this);

            return $object->make($item);
        }
    }


    /**
     * @param $id
     * @return Object
     */
    public function show($id)
    {
        $instance = clone $this;
        $instance->uri = $instance->uri . $id . "/";
        $content = $instance->httpGet($instance->uri);
        $content = $instance->createObject($content);

        return $content;
    }

    /**
     * @param integer $id
     * @param array   $options
     * @return Object
     */
    public function post($id = null, $options = [])
    {
        $instance = clone $this;
        if ($id) {
            $instance->uri = $instance->uri . $id . "/";
        }
        $content = $instance->httpPost($instance->uri, $options);
        $content = $instance->createObject($content);

        return $content;
    }

    /**
     * @param       $uri
     * @param array $options
     * @return mixed
     */
    private function httpPost($uri, $options = [])
    {
        return json_decode($this->client->post($uri, $options)->getBody()->getContents(), true);
    }

    /**
     * @param $id
     * @return mixed|ListObject
     */
    public function page($id)
    {
        $uri = $this->uri;
        $content = $this->httpGet($uri, [
            'query' => 'page=' . $id
        ]);
        $content = $this->createObject($content);

        return $content;
    }
}