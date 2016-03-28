<?php

namespace OpenCrest\Objects;

use OpenCrest\Exceptions\apiException;
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
     * HTTP Code
     *
     * @var int
     */
    protected $httpCode = 200;
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
     * Pattern that is used when making POST/PUT Requests
     *
     * @var array
     */
    protected $pattern = [];

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
     * @return ObjectInterface
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
     * @return ObjectInterface
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
     * @return ObjectInterface
     */
    function post($body, $id = NULL, $options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->post($body, $id, $options);
    }

    /**
     * @param Object        $body
     * @param int|null|null $id
     * @param array         $options
     * @return ObjectInterface
     */
    function put($body, $id = NULL, $options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->put($body, $id, $options);
    }

    /**
     * @param int|null|null $id
     * @param array         $options
     * @return ObjectInterface
     */
    function delete($id = NULL, $options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->delete($id, $options);
    }

    /**
     * @param int   $page
     * @param array $options
     * @return ObjectInterface
     */
    function page($page, $options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->page($page, $options);
    }

    /**
     * @param array $options
     * @return ObjectInterface|void
     * @throws apiException
     */
    function nextPage($options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->nextPage($options);
    }

    /**
     * @param array $options
     * @return ObjectInterface|void
     * @throws apiException
     */
    function previousPage($options = [])
    {
        $endpoint = OpenCrest::getEndpoint($this);

        return $endpoint->previousPage($options);
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

    /**
     * @return array
     */
    function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @return string
     */
    function json()
    {
        return json_encode($this->values, TRUE);
    }
}