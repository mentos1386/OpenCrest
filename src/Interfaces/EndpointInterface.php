<?php

namespace OpenCrest\Interfaces;


interface EndpointInterface
{
    /**
     * Create GET request on specific resource or root URI
     *
     * @param int   $id
     * @param array $options
     * @return ObjectInterface
     */
    function get($id = null, $options = []);

    /**
     * Create POST request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface
     */
    function post($body, $id = null, $options = []);

    /**
     * Create PUT request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface
     */
    function put($body, $id = null, $options = []);

    /**
     * Create DELETE request on specific resource or root URI
     *
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface
     */
    function delete($id = null, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param int $page
     * @return ObjectInterface
     */
    function page($page);

    /**
     * Goes to next page
     *
     * @return ObjectInterface
     */
    function nextPage();

    /**
     * Goes to previous page
     *
     * @return ObjectInterface
     */
    function previousPage();

}