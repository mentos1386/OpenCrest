<?php

namespace OpenCrest\Interfaces;

use OpenCrest\Exceptions\ApiException;

interface EndpointInterface
{
    /**
     * Create GET request on specific resource or root URI
     *
     * @param int   $resourceId
     * @param array $options
     * @return ObjectInterface|void
     */
    public function get($resourceId = null, $options = []);

    /**
     * Create POST request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $resourceId
     * @param array        $options
     * @return ObjectInterface|void
     */
    public function post($body, $resourceId = null, $options = []);

    /**
     * Create PUT request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $resourceId
     * @param array        $options
     * @return ObjectInterface|void
     */
    public function put($body, $resourceId = null, $options = []);

    /**
     * Create DELETE request on specific resource or root URI
     *
     * @param integer|null $resourceId
     * @param array        $options
     * @return ObjectInterface|void
     */
    public function delete($resourceId = null, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param int   $page
     * @param array $options
     * @return ObjectInterface|void
     */
    public function page($page, $options = []);

    /**
     * Goes to next page
     * Throws exception if there is no next page
     *
     * @param array $options
     * @return ObjectInterface|void
     * @throws ApiException
     */
    public function nextPage($options);

    /**
     * Goes to previous page
     * Throws exception if there is no previous page
     *
     * @param array $options
     * @return ObjectInterface|void
     * @throws ApiException
     */
    public function previousPage($options);
}