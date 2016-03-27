<?php

namespace OpenCrest\Interfaces;

interface ObjectInterface
{

    /**
     * ObjectInterface constructor.
     *
     * @param int $relationId
     */
    function __construct(int $relationId);

    /**
     * Used for gating attributes from Object
     *  - _get() should be used to get values
     *
     * @param string $name
     * @return array|string|int|ObjectInterface
     */
    function getAttribute(string $name);

    /**
     * @param string|null $name
     * @return ObjectInterface|array
     */
    function getRelations(string $name = NULL);

    /**
     * Used for setting attributes to Object
     *
     * @param string                           $name
     * @param array|string|int|ObjectInterface $value
     */
    function setAttribute(string $name, $value);

    /**
     * Used for setting values array to Object
     *
     * @param array $values
     */
    function setValues(array $values);

    /**
     * Used for setting values to Object
     *
     * @param string                           $name
     * @param array|string|int|ObjectInterface $value
     */
    function setValue(string $name, $value);

    /**
     * Create GET request on specific resource or root URI
     *
     * @param int   $id
     * @param array $options
     * @return ObjectInterface
     */
    function get($id = NULL, $options = []);

    /**
     * Create POST request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface
     */
    function post($body, $id = NULL, $options = []);

    /**
     * Create PUT request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface
     */
    function put($body, $id = NULL, $options = []);

    /**
     * Create DELETE request on specific resource or root URI
     *
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface
     */
    function delete($id = NULL, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param int   $page
     * @param array $options
     * @return ObjectInterface
     */
    function page($page, $options = []);
}