<?php

namespace OpenCrest\Interfaces;

use GuzzleHttp\Psr7\Response;

interface FactoryInterface
{
    /**
     * Create new object from data
     *
     * @param ObjectInterface $object
     * @param array           $data
     * @param Response        $response
     * @return ObjectInterface
     */
    function create(ObjectInterface $object, array $data, Response $response);

    /**
     * Modify object to respect body format for post/put requests
     *
     * @param ObjectInterface $object
     * @param array           $pattern
     * @return ObjectInterface
     */
    function modify(ObjectInterface $object, array $pattern);

}