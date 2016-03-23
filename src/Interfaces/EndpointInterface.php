<?php

namespace OpenCrest\Interfaces;

use OpenCrest\Objects\ListObject;

interface EndpointInterface
{
    /**
     * Create GET request on specific resource or root URI
     *
     * @param int   $id
     * @param array $options
     * @return Object
     */
    function get($id = null, $options = []);

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
     * Create PUT request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return Object
     */
    function put($body, $id = null, $options = []);

    /**
     * Create DELETE request on specific resource or root URI
     *
     * @param integer|null $id
     * @param array        $options
     * @return Object
     */
    function delete($id = null, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param int $id
     * @return ListObject
     */
    function page($id);

    /**
     * Create Object
     *
     * @param array $item
     * @return Object
     */
    function createObject($item);

}