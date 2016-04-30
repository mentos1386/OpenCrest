<?php

namespace OpenCrest\Interfaces;

use GuzzleHttp\Psr7\Response;

interface FactoryInterface
{
    /**
     * Create new object from data
     *
     * @param ObjectInterface $object Populated Object that created Request,
     *                                make new Object of same type with new $object
     * @param array           $data
     * @param Response        $response
     * @return ObjectInterface
     */
    function create(ObjectInterface $object, array $data, Response $response);

    /**
     * Modify data to respect body format for post/put requests (patter is got from provided object)
     *
     * @param ObjectInterface       $object
     * @param ObjectInterface|array $data
     * @return ObjectInterface
     */
    function modify(ObjectInterface $object, $data);

}