<?php

namespace OpenCrest;

use GuzzleHttp;
use GuzzleHttp\Psr7\Request as Request;
use OpenCrest\Exceptions\ApiException;
use OpenCrest\Exceptions\OAuthException;
use OpenCrest\Interfaces\EndpointInterface;
use OpenCrest\Interfaces\FactoryInterface;
use OpenCrest\Interfaces\ObjectInterface;

class Endpoint implements EndpointInterface
{
    /**
     * @var GuzzleHttp\Client
     */
    private $client;
    /**
     * @var GuzzleHttp\Psr7\Response
     */
    private $response;

    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var ObjectInterface
     */
    private $object;

    /**
     * Endpoint constructor
     *
     * @param ObjectInterface $object
     * @throws OAuthException
     */
    public function __construct(ObjectInterface $object)
    {
        $this->object = $object;

        $oauth = $this->object->getAttribute("oauth");

        $this->client = new GuzzleHttp\Client($this->headers($oauth));

        // When making AuthRequest but token isn't provided, throw OAuthException
        if ($oauth and !OpenCrest::getToken()) {
            throw new OAuthException();
        }

        $this->factory = OpenCrest::getFactory();
    }

    /**
     * Create Public and Auth headers for CREST
     *
     * @param bool $oauth
     * @return array
     */
    public static function headers($oauth = false)
    {
        if ($oauth) {
            $headers = [
                'base_uri' => OpenCrest::getCrestBase(),
                'headers'  => [
                    'User-Agent'    => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'        => 'application/vnd.ccp.eve.Api-' . OpenCrest::getApiVersion() . '+json; charset=utf-8',
                    'Authorization' => 'Bearer ' . OpenCrest::getToken(),
                ]
            ];
        } else {
            $headers = [
                'base_uri' => OpenCrest::getCrestBase(),
                'headers'  => [
                    'User-Agent' => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'     => 'application/vnd.ccp.eve.Api-' . OpenCrest::getApiVersion() . '+json; charset=utf-8',
                ]
            ];
        }

        return $headers;
    }

    /**
     * @param int   $page
     * @param array $options
     * @return ObjectInterface|void
     */
    public function page($page, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // Add page query to get specific page
        if (empty($options["query"])) {
            $options["query"] = "page=" . $page;
        } else {
            $options["query"] .= "&page=" . $page;
        }

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (!OpenCrest::$async) {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("get", $uri, $options);

        return null;
    }

    /**
     * Make HTTP Request
     *
     * @param string $method
     * @param string $uri
     * @param array  $options
     * @return array
     * @throws ApiException
     */
    private function http($method, $uri, $options = [])
    {
        try {
            $this->response = $this->client->request($method, $uri, $options);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            $this->ExceptionHandler($e);
        }
        $return = $this->response->getBody()->getContents();

        return json_decode($return, true);
    }

    /**
     * @param GuzzleHttp\Exception\RequestException $e
     * @throws ApiException
     */
    private function ExceptionHandler(GuzzleHttp\Exception\RequestException $e)
    {
        $json = $e->getResponse()->getBody()->getContents();
        $message = $json;

        throw new ApiException($message);
    }

    /**
     * Make HTTP GET Async Request
     *
     * @param string  $method
     * @param  string $uri
     * @param array   $options
     * @return void
     */
    private function httpAsync($method, $uri, $options = [])
    {
        // Attach the query string to the request for ASYNC
        if (!empty($options['query'])) {
            $uri .= '?' . $options['query'];
            unset($options['query']);
        }

        $request = new Request($method, $uri, $options);

        Async::addRequest($this->object->getAttribute("oauth"), $request);
        Async::addObject($this->object->getAttribute("oauth"), new $this->object);
    }

    /**
     * @param ObjectInterface $body
     * @param int|null        $resourceId
     * @param array           $options
     * @return ObjectInterface|void
     */
    function put($body, $resourceId = null, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($resourceId) {
            $uri = $uri . $resourceId . "/";
        }

        // Add body to options as json
        $options["json"] = $this->factory->modify($this->object, $body);

        // If Async is enabled, we use httpAsync function to make requests
        if (!OpenCrest::$async) {
            $content = $this->http("put", $uri, $options);

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("put", $uri, $options);

        return null;
    }

    /**
     * Create GET request on specific resource or root uri
     *
     * @param int   $resourceId
     * @param array $options
     * @return ObjectInterface|void
     */
    public function get($resourceId = null, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($resourceId) {
            $uri = $uri . $resourceId . "/";
        }

        // If Async is enabled, we use httpAsync function to make requests
        if (!OpenCrest::$async) {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("get", $uri, $options);

        return null;
    }

    /**
     * @param ObjectInterface|array $body
     * @param integer|null          $resourceId
     * @param array                 $options
     * @return ObjectInterface
     */
    public function post($body, $resourceId = null, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($resourceId) {
            $uri = $uri . $resourceId . "/";
        }

        // Add body to options as json
        $options["json"] = $this->factory->modify($this->object, $body);

        // If Async is enabled, we use httpAsync function to make requests
        if (!OpenCrest::$async) {
            $content = $this->http("post", $uri, $options);

            if (!$content) {
                $content = [];
            }

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("post", $uri, $options);

        return null;
    }

    /**
     * @param int|null $resourceId
     * @param array    $options
     * @return ObjectInterface|null
     */
    function delete($resourceId = null, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($resourceId) {
            $uri = $uri . $resourceId . "/";
        }

        // If Async is enabled, we use httpAsync function to make requests
        if (!OpenCrest::$async) {
            $content = $this->http("delete", $uri, $options);

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("delete", $uri, $options);

        return null;
    }

    /**
     * Create Next Page from data we received
     *
     * @param array $options
     * @return ObjectInterface
     * @throws ApiException
     */
    function nextPage($options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // Check if next page exists
        if (!array_key_exists("nextPage", $this->object->getAttribute("values"))) {
            throw new ApiException("There is no next page!");
        }

        // Add page query to get next page
        $options["query"] = "page=" . $this->object->getAttribute("values")["nextPage"]["page"];

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (OpenCrest::$async) {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("get", $uri, $options);

        return null;
    }

    /**
     * Create Previous Page from data we received
     *
     * @param array $options
     * @return ObjectInterface
     * @throws ApiException
     */
    function previousPage($options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // Check if next page exists
        if (!array_key_exists("previousPage", $this->object->getAttribute("values"))) {
            throw new ApiException("There is no previous page!");
        }

        // Add page query to get next page
        $options["query"] = "page=" . $this->object->getAttribute("values")["previousPage"]["page"];

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (!OpenCrest::$async) {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create($this->object, $content, $this->response);
        }

        // We make Async request and return null as data isn't available yet
        $this->httpAsync("get", $uri, $options);

        return null;
    }
}
