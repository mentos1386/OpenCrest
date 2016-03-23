<?php

namespace OpenCrest\Interfaces;

use OpenCrest\Endpoints\Endpoint;
use OpenCrest\Exceptions\RouteNotFoundException;

interface ObjectInterface
{
    /**
     * This is used to get relationship object to make get() request
     *
     * @param int $id
     * @return Object
     * @throws RouteNotFoundException
     */
    function get($id = null);

    /**
     * This is used to get relationship object to make post(id) request
     *
     * @param array|Object $body
     * @param int          $id
     * @param array        $options
     * @return Object
     */
    function post($body = [], $id = null, $options = []);

    /**
     * Used for gating values from Object
     *
     * @param $name
     * @return array
     */
    function getAttribute($name);

    /**
     * Used for setting values to Object
     * Used when manipulating with object before creating POST/PUT request
     *
     * @param $name
     * @param $value
     */
    function setAttribute($name, $value);

    /**
     * Make Object, create relationships or add values to Object
     *
     * @param array $item
     * @return Object $this
     */
    function make($item);

    /**
     * Set Endpoint to Object
     *
     * @param Endpoint $endpoint
     */
    function setEndpoint($endpoint);

}