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
    protected $attributes = [];

    /**
     * @var array
     */
    protected $relations = [];


    /**
     * Object constructor.
     */
    public function __construct()
    {
        $this->setRelations();
    }

    /**
     * @return mixed
     */
    abstract protected function setRelations();

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        array_push($this->attributes, $attributes);
    }


    /**
     * @param $name
     * @return array
     */
    public function __get($name)
    {
        return $this->getAttribute($name);
    }

    /**
     * @param $name
     * @return array
     */
    public function getAttribute($name)
    {
        return $this->attributes[$name];
    }

    /**
     * @param $item
     * @return CharactersObject
     */
    public function make($item)
    {
        foreach ($item as $key => $value) {
            if (array_key_exists($key, $this->relations)) {
                $endpoint = new $this->relations[$key];
                $this->attributes[$key] = $endpoint->createObject($value);
            } else {
                $this->attributes[$key] = $value;
            }
        }

        return $this;
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
        return isset($this->attributes[$name]);
    }

    /**
     * This is used to get relationship object to make show(id) request
     *
     * @return Object
     */
    public function get()
    {
        return $this->endpoint->show($this->id);
    }

}