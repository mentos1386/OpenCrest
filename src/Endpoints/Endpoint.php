<?php

namespace OpenCrest\Endpoints;

use GuzzleHttp;
use OpenCrest\Exceptions\apiException;
use OpenCrest\Exceptions\Exception;
use OpenCrest\Exceptions\OAuthException;
use OpenCrest\Interfaces\EndpointInterface;
use OpenCrest\Objects\ListObject;
use OpenCrest\OpenCrest;

abstract class Endpoint implements EndpointInterface
{
    /**
     * @var Object
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
     * @var integer
     */
    public $relationId;
    /**
     * @var bool
     */
    protected $oauth = False;
    /**
     * @var string
     */
    protected $token;
    /**
     * @var GuzzleHttp\Psr7\Response
     */
    private $response;

    /**
     * Endpoint constructor
     *
     * @param integer $relationId
     * @throws OAuthException
     */
    public function __construct($relationId = null)
    {
        $this->token = OpenCrest::getToken();

        // If OAuth required but token not provided, throw OAuthException
        if (empty($this->token) and $this->oauth) {
            throw new OAuthException;
        }

        // Create new GuzzleHttp Client
        $this->client = new GuzzleHttp\Client($this->headers());

        $this->relationId = $relationId;
    }

    /**
     * We create Public and Auth headers for CREST
     *
     * @return array
     */
    private function headers()
    {
        if ($this->oauth) {
            $headers = [
                'base_uri' => OpenCrest::getOauthBase(),
                'headers'  => [
                    'User-Agent'    => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'        => 'application/vnd.ccp.eve.Api-' . OpenCrest::getApiVersion() . '+json; charset=utf-8',
                    'Authorization' => 'Bearer ' . $this->token,
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
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return Object
     */
    public function post($body, $id = null, $options = [])
    {
        $instance = clone $this;

        // Add id to uri of provided
        if ($id) {
            $instance->uri = $instance->uri . $id . "/";
        }

        // Add body to options as json
        $options["json"] = $instance->makePost($body);

        // Make http request
        $instance->httpPost($instance->uri, $options);

        // We return newly created resource.
        try {
            return $this->get($body->id);
        } catch (Exception $e) {
            // Or return Array with error, TODO: if GET on resource didnt work!
            return ["POST" => "Created", "GET" => $e];
        }
    }

    /**
     * This function creates proper body format as requested by Crest
     *
     * @param array|Object $body
     * @return array
     */
    protected function makePost($body)
    {
        return $body;
    }

    /**
     * @param       $uri
     * @param array $options
     * @return mixed
     * @throws apiException
     */
    private function httpPost($uri, $options = [])
    {
        try {
            $this->response = $this->client->post($uri, $options);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            $this->ExceptionHandler($e);
        }

        return $this->response;
    }

    /**
     * @param GuzzleHttp\Exception\RequestException $e
     * @throws apiException
     */
    private function ExceptionHandler(GuzzleHttp\Exception\RequestException $e)
    {
        $json = $e->getResponse()->getBody()->getContents();
        $message = $json . ", URI: " . $this->uri;

        throw new apiException($message);
    }

    /**
     * Create GET request on specific resource or root uri
     *
     * @param int   $id
     * @param array $options
     * @return mixed|Object
     */
    public function get($id = null, $options = [])
    {
        // If ID is provided, we make GET request with ID added to the end like,
        // [uri][id]/
        if ($id) {
            $instance = clone $this;
            $instance->uri = $instance->uri . $id . "/";
            $content = $instance->httpGet($instance->uri);

            return $instance->createObject($content);
        }
        // Else we just create GET request on [uri]
        $uri = $this->uri;
        $content = $this->httpGet($uri, $options);

        return $this->createObject($content);
    }

    /**
     * Make HTTP GET Request
     *
     * @param       $uri
     * @param array $options
     * @return mixed
     * @throws apiException
     */
    private function httpGet($uri, $options = [])
    {
        try {
            $this->response = $this->client->get($uri, $options);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            $this->ExceptionHandler($e);
        }

        return json_decode($this->response->getBody()->getContents(), true);
    }

    /**
     * We create Object
     *
     * @param array $item
     * @return Object
     */
    public function createObject($item)
    {
        if (isset($item['items']) or isset($item[0])) {

            // If we have list of items
            $listObject = new ListObject();
            $listObject->setEndpoint(clone $this);

            // Add cache-control header to Object, but only if this Endpoint made request
            //  we cant add cache-control for relationships, as we don't have data for them
            if ($this->response) {
                $listObject->cache = $this->response->getHeader("cache-control")[0];
            }

            $object = $listObject->make($item);
        } else {
            // TODO: Some things don't provide ID, possible BUG, that it isn't implemented in CREST
            if (isset($item["id"])) {
                $id = $item['id'];
            } else {
                $id = null;
            }
            // If there is only one item
            $object = new $this->object($id);
            $object->setEndpoint(clone $this);

            // Add cache-control header to Object, but only if this Endpoint made request
            //  we cant add cache-control for relationships, as we don't have data for them
            if ($this->response) {
                $object->cache = $this->response->getHeader("cache-control")[0];
            }

            $object = $object->make($item);
        }

        return $object;
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

    /**
     * @param Object        $body
     * @param int|null|null $id
     * @param array         $options
     * @return mixed
     */
    function put($body, $id = null, $options = [])
    {
        // TODO: Implement put() method.
    }

    /**
     * @param int|null|null $id
     * @param array         $options
     * @return mixed
     */
    function delete($id = null, $options = [])
    {
        // TODO: Implement delete() method.
    }
}