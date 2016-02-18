<?php

namespace OpenCrest\Endpoints;

use GuzzleHttp;
use OpenCrest\Endpoints\Objects\ListObject;
use OpenCrest\OpenCrest;

abstract class Endpoint
{
    /**
     * @var Object
     */
    protected static $object;
    /**
     * @var GuzzleHttp\Client
     */
    public $client;
    /**
     * @var
     */
    public $uri;
    /**
     * @var string
     */
    protected $baseUrl = "https://public-crest.eveonline.com/";
    /**
     * @var bool
     */
    protected $oauth = False;
    /**
     * @var string
     */
    protected $token;

    /**
     * Endpoint constructor.
     *
     * @param string $token
     */
    public function __construct($token = "")
    {
        $this->client = new GuzzleHttp\Client($this->headers());
        $this->token = $token;

        $this->setObject();
    }

    /**
     * @return array
     */
    private function headers()
    {
        if ($this->oauth) {
            $headers = [
                'base_uri' => $this->baseUrl,
                'headers'  => [
                    'User-Agent'    => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'        => 'Accept: application/vnd.ccp.eve.Api-' . OpenCrest::apiVersion() . '+json',
                    'Authorization' => 'Bearer ' . $this->token,
                ]
            ];
        } else {
            $headers = [
                'base_uri' => $this->baseUrl,
                'headers'  => [
                    'User-Agent' => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'     => 'Accept: application/vnd.ccp.eve.Api-' . OpenCrest::apiVersion() . '+json',
                ]
            ];
        }

        return $headers;
    }

    /**
     * @return void
     */
    abstract protected function setObject();

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
    public static function createObject($item)
    {
        if (isset($item['items']) or isset($item[0])) {
            // If we have list of items
            $listObject = new ListObject();
            $listObject->setEndpoint(new static);

            return $listObject->make($item);
        } else {
            // If there is only one item
            self::$object->setEndpoint(new static);

            return self::$object->make($item);
        }
    }


    /**
     * @param $id
     * @return Object
     */
    public function show($id)
    {
        $uri = $this->uri . $id . "/";

        $content = $this->get($uri);

        $content = $this->createObject($content);

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

    public function getObject()
    {
        return self::$object;
    }

}