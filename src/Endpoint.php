<?php

namespace OpenCrest;

use GuzzleHttp;
use GuzzleHttp\Psr7\Request as Request;
use OpenCrest\Exceptions\apiException;
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
    public static function headers($oauth = FALSE)
    {
        if ($oauth) {
            $headers = [
                'base_uri' => OpenCrest::getOauthBase(),
                'headers'  => [
                    'User-Agent'    => 'OpenCrest/' . OpenCrest::version(),
                    'Accept'        => 'application/vnd.ccp.eve.Api-' . OpenCrest::getApiVersion() . '+json; charset=utf-8',
                    'Authorization' => 'Bearer ' . OpenCrest::getToken(),
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
     * @param int   $page
     * @param array $options
     * @return ObjectInterface|void
     */
    public function page($page, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // Add page query to get specific page
        $options["query"] = "page=" . $page;

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("get", $uri, $options);
        } else {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
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
        $request = new Request($method, $uri, $options);

        Async::addRequest($this->object->getAttribute("oauth"), $request);
        Async::addObject($this->object->getAttribute("oauth"), new $this->object);
    }

    /**
     * Make HTTP Request
     *
     * @param string $method
     * @param string $uri
     * @param array  $options
     * @return array
     * @throws apiException
     */
    private function http($method, $uri, $options = [])
    {
        try {
            $this->response = $this->client->request($method, $uri, $options);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            $this->ExceptionHandler($e);
        }
        $return = $this->response->getBody()->getContents();

        return json_decode($return, TRUE);
    }

    /**
     * @param GuzzleHttp\Exception\RequestException $e
     * @throws apiException
     */
    private function ExceptionHandler(GuzzleHttp\Exception\RequestException $e)
    {
        $json = $e->getResponse()->getBody()->getContents();
        $message = $json;

        throw new apiException($message);
    }

    /**
     * @param ObjectInterface $body
     * @param int|null        $id
     * @param array           $options
     * @return ObjectInterface|void
     */
    function put($body, $id = NULL, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($id) {
            $uri = $uri . $id . "/";
        }

        // Add body to options as json
        $options["json"] = $this->factory->modify($this->object, $body);

        // If Async is enabled, we use httpAsync function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("put", $uri, $options);
        } else {
            $content = $this->http("put", $uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }

    /**
     * Create GET request on specific resource or root uri
     *
     * @param int   $id
     * @param array $options
     * @return ObjectInterface|void
     */
    public function get($id = NULL, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($id) {
            $uri = $uri . $id . "/";
        }

        // If Async is enabled, we use httpAsync function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("get", $uri, $options);
        } else {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }

    /**
     * @param ObjectInterface|array $body
     * @param integer|null          $id
     * @param array                 $options
     * @return ObjectInterface
     */
    public function post($body, $id = NULL, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($id) {
            $uri = $uri . $id . "/";
        }

        // Add body to options as json
        $options["json"] = $this->factory->modify($this->object, $body);

        // If Async is enabled, we use httpAsync function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("post", $uri, $options);
        } else {
            $content = $this->http("post", $uri, $options);

            if (!$content) {
                $content = [];
            }

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }

    /**
     * @param int|null $id
     * @param array    $options
     * @return ObjectInterface|void
     */
    function delete($id = NULL, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        if ($id) {
            $uri = $uri . $id . "/";
        }

        // If Async is enabled, we use httpAsync function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("delete", $uri, $options);
        } else {
            $content = $this->http("delete", $uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }

    /**
     * Create Next Page from data we received
     *
     * @param array $options
     * @return ObjectInterface
     * @throws apiException
     */
    function nextPage($options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // Check if next page exists
        if (!array_key_exists("nextPage", $this->object->getAttribute("values"))) {
            throw new apiException("There is no next page!");
        }

        // Add page query to get next page
        $options["query"] = "page=" . $this->object->getAttribute("values")["nextPage"]["page"];

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("get", $uri, $options);
        } else {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }

    /**
     * Create Previous Page from data we received
     *
     * @param array $options
     * @return ObjectInterface
     * @throws apiException
     */
    function previousPage($options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // Check if next page exists
        if (!array_key_exists("previousPage", $this->object->getAttribute("values"))) {
            throw new apiException("There is no previous page!");
        }

        // Add page query to get next page
        $options["query"] = "page=" . $this->object->getAttribute("values")["previousPage"]["page"];

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (OpenCrest::$async) {
            $this->httpAsync("get", $uri, $options);
        } else {
            $content = $this->http("get", $uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }
}