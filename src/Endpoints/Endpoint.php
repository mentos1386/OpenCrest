<?php namespace OpenCrest\Endpoints;

use GuzzleHttp;
use OpenCrest\Endpoints\Objects\AbstractObject;
use OpenCrest\Endpoints\Objects\ListObject;

class Endpoint
{
    private $baseUrl = "https://public-crest.eveonline.com/";
    public $client;
    protected $oauth = False;
    public $uri;
    protected $token;

    public function __construct($token="")
    {
        $this->client = new GuzzleHttp\Client($this->headers());
        $this->token = $token;
    }

    private function headers()
    {
        if($this->oauth){
            $headers = [
                'base_uri' => $this->baseUrl,
                'headers' => [
                    'User-Agent' => 'OpenCrest/0.1',
                    'Authorization' => 'Bearer '.$this->token,
                    ]
                ];
        }
        else {
            $headers = [
                'base_uri' => $this->baseUrl,
                'headers' => [
                    'User-Agent' => 'OpenCrest/0.1',
                ]
            ];
        }

        return $headers;
    }

    /**
     * @param $item
     * @return AbstractObject
     */
    public function createObject($item){}

    /**
     * @param $items
     * @return AbstractObject
     */
    public function createObjectAll($items){}

    /**
     * @param $content
     * @return ListObject
     */
    public function parseAll($content)
    {
        $instance = new ListObject();
        $instance->endpoint = new AlliancesEndpoint();

        $content = json_decode($content, True);

        $instance->totalCount = $content['totalCount'];
        $instance->pageCount = $content['pageCount'];

        $this->parsePages($content, $instance);

        $instance->items = $this->createObjectAll($content['items']);



        return $instance;
    }

    public function parseUrl($url)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $value);
        return $value;
    }

    protected function parsePages($pages, $instance)
    {

        if(isset($pages['next']))
        {
            $instance->nextPage = [
                'href' => $pages['next']['href'],
                'page' => ($this->parseUrl($pages['next']['href'])['page']?(int)$this->parseUrl($pages['next']['href'])['page']:null)
            ];
        }
        if(isset($pages['previous']))
        {
            $instance->previousPage = [
                'href' => $pages['previous']['href'],
                'page' => (int)(!empty($this->parseUrl($pages['previous']['href']))? $this->parseUrl($pages['previous']['href'])['page']:1)
            ];
        }
    }
}