<?php

namespace OpenCrest\Endpoints;

use GuzzleHttp;
use OpenCrest\Endpoints\Objects\AbstractObject;
use OpenCrest\Endpoints\Objects\ListObject;
use OpenCrest\OpenCrest;

abstract class Endpoint
{
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
        $this->instance = $this;
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
     * @param array $query
     * @return mixed
     */
    public function get($uri, $query = [])
    {
        return json_decode($this->client->get($uri, $query)->getBody()->getContents(), true);
    }

    /**
     * @param $item
     * @return AbstractObject
     */
    public function createObject($item)
    {
        if (isset($item['items'])) {
            // If we have list of items
            $items = $item['items'];
            $collection = new ListObject();
            $collection->endpoint = $this;

            $collection->totalCount = $item['totalCount'];
            $collection->pageCount = $item['pageCount'];

            self::parsePages($item, $collection);

            foreach ($items as $item) {

                $object = $this->make($item);
                array_push($collection->items, $object);
            }

            return $collection;
        } else {
            // If there is only one item
            return $this->make($item);
        }
    }

    /**
     * @param $pages
     * @param $instance
     */
    protected function parsePages($pages, $instance)
    {

        if (isset($pages['next'])) {
            $instance->nextPage = [
                'href' => $pages['next']['href'],
                'page' => ($this->parseUrl($pages['next']['href'])['page'] ? (int)$this->parseUrl($pages['next']['href'])['page'] : null)
            ];
        }
        if (isset($pages['previous'])) {
            $instance->previousPage = [
                'href' => $pages['previous']['href'],
                'page' => (int)(!empty($this->parseUrl($pages['previous']['href'])) ? $this->parseUrl($pages['previous']['href'])['page'] : 1)
            ];
        }
    }

    /**
     * @param $url
     * @return mixed
     */
    public function parseUrl($url)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $value);

        return $value;
    }

    /**
     * @param $item
     * @return mixed
     */
    abstract protected function make($item);

    /**
     * @param $id
     * @return AbstractObject
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

}