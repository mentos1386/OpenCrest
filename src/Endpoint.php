<?php

namespace OpenCrest;

use GuzzleHttp;
use GuzzleHttp\Psr7\Request as Request;
use OpenCrest\Exceptions\apiException;
use OpenCrest\Exceptions\Exception;
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
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return Object
     */
    public function post($body, $id = NULL, $options = [])
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
        $message = $json;

        throw new apiException($message);
    }

    /**
     * Create GET request on specific resource or root uri
     *
     * @param int   $id
     * @param array $options
     * @return ObjectInterface
     */
    public function get($id = NULL, $options = [])
    {
        $uri = $this->object->getAttribute("uri");

        // If Async is enabled, we use httpAsyncGet function to make requests
        if (OpenCrest::$async) {
            $this->httpAsyncGet($uri, $options);
        } else {
            $content = $this->httpGet($uri, $options);

            return $this->factory->create(new $this->object, $content, $this->response);
        }
    }

    /**
     * Make HTTP GET Async Request
     *
     * @param       $uri
     * @param array $options
     * @return void
     */
    private function httpAsyncGet($uri, $options = [])
    {
        $request = new Request("get", $uri, $options);

        Async::addRequest($this->object->getAttribute("oauth"), $request);
        Async::addObject($this->object->getAttribute("oauth"), new $this->object);
    }

    /**
     * Make HTTP GET Request
     *
     * @param string $uri
     * @param array  $options
     * @return array
     * @throws apiException
     */
    private function httpGet($uri, $options = [])
    {
        try {
            $this->response = $this->client->get($uri, $options);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            $this->ExceptionHandler($e);
        }

        $return = $this->response->getBody()->getContents();

        return json_decode($return, TRUE);
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
    function put($body, $id = NULL, $options = [])
    {
        // TODO: Implement put() method.
    }

    /**
     * @param int|null|null $id
     * @param array         $options
     * @return mixed
     */
    function delete($id = NULL, $options = [])
    {
        // TODO: Implement delete() method.
    }

    /**
     * Create Next Page from data we received
     *
     * @return ListObject
     */
    function nextPage()
    {
        $page = $this->endpoint->get($this->endpoint->uri, [
            'query' => 'page=' . $this->values['nextPage']['page']
        ]);

        return $this->endpoint->createObject($page);
    }

    /**
     * Create Previous Page from data we received
     *
     * @return ListObject
     */
    function previousPage()
    {
        $page = $this->endpoint->get($this->endpoint->uri, [
            'query' => 'page=' . $this->values['previousPage']['page']
        ]);

        return $this->endpoint->createObject($page);
    }
}