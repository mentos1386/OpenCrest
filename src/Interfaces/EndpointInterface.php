<?php

namespace OpenCrest\Interfaces;


use OpenCrest\Exceptions\apiException;

interface EndpointInterface
{
    /**
     * Create GET request on specific resource or root URI
     *
     * @param int   $id
     * @param array $options
     * @return ObjectInterface|void
     */
    function get($id = null, $options = []);

    /**
     * Create POST request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface|void
     */
    function post($body, $id = null, $options = []);

    /**
     * Create PUT request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface|void
     */
    function put($body, $id = null, $options = []);

    /**
     * Create DELETE request on specific resource or root URI
     *
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface|void
     */
    function delete($id = null, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param int $page
     * @param array $options
     * @return ObjectInterface|void
     */
    function page($page, $options = []);

    /**
     * Goes to next page
     * Throws exception if there is no next page
     *
     * @param array $options
     * @return ObjectInterface|void
     * @throws apiException
     */
    function nextPage($options);

    /**
     * Goes to previous page
     * Throws exception if there is no previous page
     *
     * @param array $options
     * @return ObjectInterface|void
     * @throws apiException
     */
    function previousPage($options);
}