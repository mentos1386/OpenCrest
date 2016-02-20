<?php

namespace OpenCrest\Endpoints;

use GuzzleHttp;
use OpenCrest\Endpoints\Objects\ListObject;
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
     * @var bool
     */
    protected $oauth = False;
    /**
     * @var string
     */
    protected $token;
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
     * @param string $token
     */
    public function __construct($token = "")
    {
        $this->token = $token;
        $this->client = new GuzzleHttp\Client($this->headers());
        $this->object = "OpenCrest\\Endpoints\\Objects\\" . $this->object;

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
     * @return ListObject
     */
    public function all()
    {
        $uri = $this->uri;
        $content = $this->get($uri);
        $content = $this->createObject($content);

        return $content;
    }

    /**
     * @param       $uri
     * @param array $options
     * @return mixed
     */
    public function get($uri, $options = [])
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
            // If there is only one item
            $object = new $this->object;
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
        $content = $instance->get($instance->uri);
        $content = $instance->createObject($content);

        return $content;
    }

    /**
     * @param $id
     * @return mixed|ListObject
     */
    public function page($id)
    {
        $uri = $this->uri;
        $content = $this->get($uri, [
            'query' => 'page=' . $id
        ]);
        $content = $this->createObject($content);

        return $content;
    }
}