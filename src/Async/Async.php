<?php

namespace OpenCrest\Async;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use OpenCrest\Endpoints\Endpoint;
use OpenCrest\OpenCrest;

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
    private static $endpoints = [
        "public" => [],
        "oauth"  => [],
    ];
    /**
     * @var array
     */
    private static $promise = [
        "public" => null,
        "oauth"  => null,
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
        self::$clientPublic = new Client(OpenCrest::headers());
        self::$clientOauth = new Client(OpenCrest::headers(true));

        // Public
        $poolPublic = new Pool(self::$clientPublic, self::$requests["public"], [
            "concurrency" => 20,
            "fulfilled"   => function (Response $response, $index) {
                // On success we json_decode response
                $response = json_decode($response->getBody()->getContents(), true);
                // Create object and push it to responses success
                array_push(self::$responses["public"]["success"], self::$endpoints["public"][$index]->createObject($response));
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
                $response = json_decode($response->getBody()->getContents(), true);
                // Create object and push it to responses success
                array_push(self::$responses["oauth"]["success"], self::$endpoints["oauth"][$index]->createObject($response));
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
        if (!$oauth) {
            self::$requests["public"] = $requests;
        } else {
            self::$requests["oauth"] = $requests;
        }
    }

    /**
     * @param bool    $oauth
     * @param Request $request
     */
    public static function addRequest($oauth, $request)
    {
        if (!$oauth) {
            array_push(self::$requests["public"], $request);
        } else {
            array_push(self::$requests["oauth"], $request);
        }
    }

    /**
     * @param bool  $oauth
     * @param array $endpoints
     */
    public static function setEndpoints($oauth, $endpoints)
    {
        if (!$oauth) {
            self::$endpoints["public"] = $endpoints;
        } else {
            self::$endpoints["oauth"] = $endpoints;
        }
    }

    /**
     * @param bool     $oauth
     * @param Endpoint $endpoint
     */
    public static function addEndpoint($oauth, $endpoint)
    {
        if (!$oauth) {
            array_push(self::$endpoints["public"], $endpoint);
        } else {
            array_push(self::$endpoints["oauth"], $endpoint);
        }
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
    public function getEndpoints($base = "public")
    {
        return self::$endpoints[$base];
    }
}