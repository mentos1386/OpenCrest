<?php

namespace OpenCrest\Interfaces;

use OpenCrest\Objects\ListObject;

interface EndpointInterface
{
    /**
     * Create GET request on specific resource or root URI
     *
     * @param int $id
     * @return Object
     */
    function get($id = null);

    /**
     * Create POST request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return Object
     */
    function post($body, $id = null, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param $id
     * @return ListObject
     */
    function page($id);

    /**
     * We create Object
     *
     * @param $item
     * @return Object
     */
    function createObject($item);

}