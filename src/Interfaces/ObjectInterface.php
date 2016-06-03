<?php

namespace OpenCrest\Interfaces;

interface ObjectInterface
{

    /**
     * ObjectInterface constructor.
     *
     * @param int $relationId
     */
    public function __construct(int $relationId = null);

    /**
     * Set new Endpoint to object
     *
     * @param EndpointInterface $endpoint
     */
    public function setEndpoint(EndpointInterface $endpoint);

    /**
     * Returns values of object as json
     *
     * @return string
     */
    public function json();

    /**
     * Used for gating attributes from Object
     *  - _get() should be used to get values
     *
     * @param string $name
     * @return array|string|int|ObjectInterface
     */
    public function getAttribute(string $name);

    /**
     * Get Object relations, if $name == null, return whole array, otherwise return Object that is == $name
     *
     * @param string|null $name
     * @return ObjectInterface|array
     */
    public function getRelations(string $name = null);

    /**
     * Get Pattern array that is used when making POST/PUT requests
     *
     * @return array
     */
    public function getPattern();

    /**
     * Used for setting attributes to Object
     *
     * @param string                           $name
     * @param array|string|int|ObjectInterface $value
     */
    public function setAttribute(string $name, $value);

    /**
     * Used for setting values array to Object
     *
     * @param array $values
     */
    public function setValues(array $values);

    /**
     * Used for setting values to Object
     *
     * @param string                           $name
     * @param array|string|int|ObjectInterface $value
     */
    public function setValue(string $name, $value);

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
     *
     * @return ObjectInterface|void
     */
    public function nextPage();

    /**
     * Goes to previous page
     *
     * @return ObjectInterface|void
     */
    public function previousPage();
}
