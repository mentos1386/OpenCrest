<?php

namespace OpenCrest\Interfaces;

interface ObjectInterface
{

    /**
     * ObjectInterface constructor.
     *
     * @param int $relationId
     */
    function __construct(int $relationId = NULL);

    /**
     * Returns values of object as json
     *
     * @return string
     */
    function json();

    /**
     * Used for gating attributes from Object
     *  - _get() should be used to get values
     *
     * @param string $name
     * @return array|string|int|ObjectInterface
     */
    function getAttribute(string $name);

    /**
     * Get Object relations, if $name == null, return whole array, otherwise return Object that is == $name
     *
     * @param string|null $name
     * @return ObjectInterface|array
     */
    function getRelations(string $name = NULL);

    /**
     * Get Pattern array that is used when making POST/PUT requests
     *
     * @return array
     */
    function getPattern();

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
     * @return ObjectInterface|void
     */
    function get($id = NULL, $options = []);

    /**
     * Create POST request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface|void
     */
    function post($body, $id = NULL, $options = []);

    /**
     * Create PUT request on specific resource or root URI
     *
     * @param Object       $body
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface|void
     */
    function put($body, $id = NULL, $options = []);

    /**
     * Create DELETE request on specific resource or root URI
     *
     * @param integer|null $id
     * @param array        $options
     * @return ObjectInterface|void
     */
    function delete($id = NULL, $options = []);

    /**
     * Create GET request on specific page
     *
     * @param int   $page
     * @param array $options
     * @return ObjectInterface|void
     */
    function page($page, $options = []);

    /**
     * Goes to next page
     *
     * @return ObjectInterface|void
     */
    function nextPage();

    /**
     * Goes to previous page
     *
     * @return ObjectInterface|void
     */
    function previousPage();
}