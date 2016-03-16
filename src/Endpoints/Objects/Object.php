<?php

namespace OpenCrest\Endpoints\Objects;

use OpenCrest\Endpoints\Endpoint;

abstract class Object
{
    /**
     * @var Endpoint
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $values = [];

    /**
     * @var array
     */
    protected $relations = [];
    /**
     * @var int|null
     */
    protected $id;

    /**
     * Object constructor.
     *
     * @param integer $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
        $this->setRelations();
    }

    /**
     * @return mixed
     */
    abstract protected function setRelations();

    /**
     * @param array $values
     */
    public function setValues($values)
    {
        array_push($this->values, $values);
    }


    /**
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
     * @param $name
     * @return array
     */
    public function getAttribute($name)
    {
        return $this->values[$name];
    }

    /**
     * @param $name
     * @param $value
     */
    public function setAttribute($name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
     * @param $item
     * @return Object
     */
    public function make($item)
    {
        if ($item) {
            foreach ($item as $key => $value) {
                if (array_key_exists($key, $this->relations)) {
                    $endpoint = new $this->relations[$key]($this->id);
                    $this->values[$key] = $endpoint->createObject($value);
                } else {
                    $this->values[$key] = $value;
                }
            }
        }

        return clone $this;
    }

    /**
     * @param $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->values[$name]);
    }

    /**
     * This is used to get relationship object to make show(id)/get() request
     *
     * @param int $id
     * @return Object
     */
    public function get($id = null)
    {
        if ($id) {
            return $this->endpoint->show($id);
        } elseif ($this->id) {
            return $this->endpoint->show($this->id);
        } else {
            return $this->endpoint->get();
        }
    }

    /**
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