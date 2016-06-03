<?php

namespace OpenCrest;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use OpenCrest\Interfaces\ObjectInterface;

class Async
{
    /**
     * Contains all requests
     *
     * @var array
     */
    private static $requests = [
        "public" => [],
        "oauth"  => [],
    ];
    /**
     * Contains endpoints of requests (Used to create objects)
     *
     * @var array
     */
    private static $objects = [
        "public" => [],
        "oauth"  => [],
    ];
    /**
     * @var array
     */
    private static $promise = [
        "public" => NULL,
        "oauth"  => NULL,
    ];
    /**
     * Contains public and oauth responses (successes and rejections/errors)
     *
     * @var array
     */
    private static $responses = [
        "public" => [
            "success"  => [],
            "rejected" => [],
        ],
        "oauth"  => [
            "success"  => [],
            "rejected" => [],
        ],
    ];

    /**
     * @var Client
     */
    private static $clientPublic;
    /**
     * @var Client
     */
    private static $clientOauth;

    /**
     * Make all the requests and push responses (as objects if success) to self::responses["public" or "oauth"]
     */
    public static function run()
    {
        // Create Public and Oauth Clients
        self::$clientPublic = new Client(Endpoint::headers());
        self::$clientOauth = new Client(Endpoint::headers(TRUE));

        // Public
        $poolPublic = new Pool(self::$clientPublic, self::$requests["public"], [
            "concurrency" => 20,
            "fulfilled"   => function (Response $response, $index) {
                // On success we json_decode response
                $data = json_decode($response->getBody()->getContents(), TRUE);
                // Create object and push it to responses success
                $factory = OpenCrest::getFactory();
                $object = $factory->create(self::$objects["public"][$index], $data, $response);

                array_push(self::$responses["public"]["success"], $object);
            },
            "rejected"    => function ($reason, $index) {
                // On failure we push it to responses rejected
                array_push(self::$responses["public"]["rejected"], ["reason" => $reason, "index" => $index]);
            }
        ]);

        self::$promise["public"] = $poolPublic->promise();
        self::$promise["public"]->wait();

        // Oauth
        $poolOauth = new Pool(self::$clientOauth, self::$requests["oauth"], [
            "concurrency" => 20,
            "fulfilled"   => function (Response $response, $index) {
                // On success we json_decode response
                $data = json_decode($response->getBody()->getContents(), TRUE);
                // Create object and push it to responses success
                $factory = OpenCrest::getFactory();
                $object = $factory->create(self::$objects["oauth"][$index], $data, $response);

                array_push(self::$responses["oauth"]["success"], $object);
            },
            "rejected"    => function ($reason, $index) {
                // On failure we push it to responses rejected
                array_push(self::$responses["oauth"]["rejected"], ["reason" => $reason, "index" => $index]);
            }
        ]);

        self::$promise["oauth"] = $poolOauth->promise();
        self::$promise["oauth"]->wait();
    }

    /**
     * @param bool  $oauth
     * @param array $requests
     */
    public static function setRequests($oauth, $requests)
    {
        $oauth ? self::$requests["oauth"] = $requests : self::$requests["public"] = $requests;
    }

    /**
     * @param bool    $oauth
     * @param Request $request
     */
    public static function addRequest($oauth, $request)
    {
        $oauth ? array_push(self::$requests["oauth"], $request) : array_push(self::$requests["public"], $request);
    }

    /**
     * @param bool  $oauth
     * @param array $objects
     */
    public static function setObjects($oauth, $objects)
    {
        $oauth ? self::$objects["oauth"] = $objects : self::$objects["public"] = $objects;
    }

    /**
     * @param bool            $oauth
     * @param ObjectInterface $object
     */
    public static function addObject($oauth, ObjectInterface $object)
    {
        $oauth ? array_push(self::$objects["oauth"], $object) : array_push(self::$objects["public"], $object);
    }

    /**
     * @param string $base
     * @return array
     */
    public static function getPromise($base = "public")
    {
        return self::$promise[$base];
    }

    /**
     * @param string $base
     * @return array
     */
    public static function getResponses($base = "public")
    {
        return self::$responses[$base];
    }

    /**
     * @param string $base
     * @return array
     */
    public function getRequests($base = "public")
    {
        return self::$requests[$base];
    }

    /**
     * @param string $base
     * @return array
     */
    public function getObjects($base = "public")
    {
        return self::$objects[$base];
    }
}