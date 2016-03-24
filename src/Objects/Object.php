<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\Endpoint;
use OpenCrest\Exceptions\apiException;
use OpenCrest\Interfaces\ObjectInterface;

abstract class Object implements ObjectInterface
{
    /**
     * Time in seconds, for how long value doesn't update on endpoint
     *
     * @var string
     */
    public $cache;
    /**
     * Object Endpoint
     *
     * @var Endpoint
     */
    protected $endpoint;
    /**
     * Object Endpoint that is used for Listed Objects
     *  Used for regions->sell/buyOrders where you get list, and then access specific order from orders()->get(id)
     *
     * @var Endpoint
     */
    protected $listEndpoint = null;
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
     * ID of resource
     *
     * @var int|null
     */
    protected $id;

    /**
     * Object constructor
     *
     * @param integer $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
        $this->setRelations();
    }

    /**
     * Used for child objects to set relationships
     *
     * @return mixed
     */
    abstract protected function setRelations();

    /**
     * Used for gating values from Object
     *
     * @param $name
     * @return mixed|Object
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->values)) {
            return $this->getAttribute($name);
        }

        return $this->$name;
    }

    /**
     * Used for gating values from Object
     *
     * @param $name
     * @return array
     */
    public function getAttribute($name)
    {
        return $this->values[$name];
    }

    /**
     * Used for setting values to Object
     * Used when manipulating with object before creating POST/PUT request
     *
     * @param $name
     * @param $value
     */
    public function setAttribute($name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
     * Make Object, create relationships or add values to Object
     *
     * @param array $item
     * @return Object $this
     */
    public function make($item)
    {
        if ($item) {
            foreach ($item as $key => $value) {
                if (array_key_exists($key, $this->relations)) {
                    $endpoint = new $this->relations[$key]($this->id);

                    // ˇˇ
                    if (is_string($value)) {
                        // TODO: Sometimes relationship is only a string with href, not array like usually.
                        // TODO: When crest behaves as it should, remove this!
                        // Seen in GET crest.../wars/21/  value "killmails"
                        $this->values[$key] = $value;
                        continue;
                    }
                    // ^^

                    $this->values[$key] = $endpoint->createObject($value);
                } else {
                    $this->values[$key] = $value;
                }
            }
        }

        return clone $this;
    }

    /**
     * Set Endpoint to Object
     *
     * @param Endpoint $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
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
     * This is used to get relationship object to make get() request
     *
     * @param int   $id
     * @param array $options
     * @return Object
     * @throws apiException
     */
    public function get($id = null, $options = [])
    {
        if ($this instanceof ListObject) {
            throw new apiException("Can't make GET request on ListObject");
        }
        if ($this->id) {
            $id = $this->id;
        }

        return $this->endpoint->get($id, $options);
    }

    /**
     * This is used to get relationship object to make post(id) request
     *
     * @param array|Object $body
     * @param int          $id
     * @param array        $options
     * @return Object
     */
    public function post($body = [], $id = null, $options = [])
    {
        if (!$id) {
            $id = $this->id;
        }

        return $this->endpoint->post($body, $id, $options);
    }

}