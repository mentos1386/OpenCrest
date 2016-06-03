<?php

namespace OpenCrest\Objects;

use OpenCrest\Exceptions\ApiException;
use OpenCrest\Interfaces\EndpointInterface;
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
    protected $resourceId;
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
    protected $oauth = false;
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
     * Endpoint used for making get/post/put/delete requests
     *
     * @var EndpointInterface
     */
    protected $endpoint;

    /**
     * Object constructor
     *
     * @param int $relationId
     */
    public function __construct(int $relationId = null)
    {
        $this->relationId = $relationId;
        $this->endpoint = OpenCrest::getEndpoint($this);
    }

    /**
     * @param EndpointInterface $endpoint
     */
    public function setEndpoint(EndpointInterface $endpoint)
    {
        $this->endpoint = $endpoint;
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
     * @param int|null $resourceId
     * @param array    $options
     * @return ObjectInterface
     */
    public function get($resourceId = null, $options = [])
    {
        return $this->endpoint->get($resourceId, $options);
    }

    /**
     * @param Object        $body
     * @param int|null|null $resourceId
     * @param array         $options
     * @return ObjectInterface
     */
    public function post($body, $resourceId = null, $options = [])
    {
        return $this->endpoint->post($body, $resourceId, $options);
    }

    /**
     * @param Object        $body
     * @param int|null|null $resourceId
     * @param array         $options
     * @return ObjectInterface
     */
    public function put($body, $resourceId = null, $options = [])
    {
        return $this->endpoint->put($body, $resourceId, $options);
    }

    /**
     * @param int|null|null $resourceId
     * @param array         $options
     * @return ObjectInterface
     */
    public function delete($resourceId = null, $options = [])
    {
        return $this->endpoint->delete($resourceId, $options);
    }

    /**
     * @param int   $page
     * @param array $options
     * @return ObjectInterface
     */
    public function page($page, $options = [])
    {
        return $this->endpoint->page($page, $options);
    }

    /**
     * @param array $options
     * @return ObjectInterface|void
     * @throws ApiException
     */
    public function nextPage($options = [])
    {
        return $this->endpoint->nextPage($options);
    }

    /**
     * @param array $options
     * @return ObjectInterface|void
     * @throws ApiException
     */
    public function previousPage($options = [])
    {
        return $this->endpoint->previousPage($options);
    }

    /**
     * @param array $values
     */
    public function setValues(array $values)
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
    public function getRelations(string $name = null)
    {
        if ($name) {
            return $this->relations[$name];
        }

        return $this->relations;
    }

    /**
     * @return array
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @return string
     */
    public function json()
    {
        return json_encode($this->values, true);
    }
}
