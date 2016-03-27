<?php

namespace OpenCrest\Objects;

use OpenCrest\Interfaces\ObjectInterface;
use OpenCrest\OpenCrest;

class Object implements ObjectInterface
{
    /**
     * Time in seconds, for how long value doesn't update on CREST
     *
     * @var string
     */
    protected $cache;
    /**
     * ID of resource
     *
     * @var int|null
     */
    protected $id;
    /**
     * Relation ID of resource (like character id)
     *
     * @var int|null
     */
    protected $relationId;
    /**
     * URI Of resource
     *
     * @var string
     */
    protected $uri;
    /**
     * URI Of list resource (sometimes this one is different than uri for only one item)
     *  - in case of market/orders/buy or market/orders/sell
     *
     * @var string
     */
    protected $listUri;
    /**
     * Is OAUTH required for this resource
     *
     * @var bool
     */
    protected $oauth = FALSE;
    /**
     * Object values
     *
     * @var array
     */
    protected $values = [];
    /**
     * Names and Endpoints of relationships
     *
     * @var array
     */
    protected $relations = [];

    /**
     * Object constructor
     *
     * @param int $relationId
     */
    public function __construct(int $relationId = NULL)
    {
        $this->relationId = $relationId;
    }

    /**
     * Used for gating values from Object
     *
     * @param $name
     * @return mixed|Object
     */
    public function __get($name)
    {
        return $this->values[$name];
    }

    /**
     * Used for gating attribute from Object
     *
     * @param string $name
     * @return array|string|int|ObjectInterface
     */
    public function getAttribute(string $name)
    {
        return $this->$name;
    }

    /**
     * Used for setting attributes to Object
     *
     * @param string                           $name
     * @param array|string|int|ObjectInterface $value
     */
    public function setAttribute(string $name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Check if values is set in Object
     *
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->values[$name]);
    }

    /**
     * @param int|null $id
     * @param array    $options
     * @return mixed
     */
    function get($id = NULL, $options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->get($id, $options);
    }

    /**
     * @param Object        $body
     * @param int|null|null $id
     * @param array         $options
     * @return mixed
     */
    function post($body, $id = NULL, $options = [])
    {
        // TODO: Implement post() method.
    }

    /**
     * @param Object        $body
     * @param int|null|null $id
     * @param array         $options
     * @return mixed
     */
    function put($body, $id = NULL, $options = [])
    {
        // TODO: Implement put() method.
    }

    /**
     * @param int|null|null $id
     * @param array         $options
     * @return mixed
     */
    function delete($id = NULL, $options = [])
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int   $page
     * @param array $options
     * @return mixed
     */
    function page($page, $options = [])
    {
        // TODO: Implement page() method.
    }

    /**
     * @param array $values
     */
    function setValues(array $values)
    {
        $this->values = $values;
    }

    /**
     * Used for setting values to Object
     *
     * @param string                           $name
     * @param array|string|int|ObjectInterface $value
     */
    public function setValue(string $name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
     * @param null|string|null $name
     * @return mixed
     */
    public function getRelations(string $name = NULL)
    {
        if ($name) {
            return $this->relations[$name];
        }

        return $this->relations;
    }
}