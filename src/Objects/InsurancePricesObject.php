<?php

namespace OpenCrest\Objects;

class InsurancePricesObject extends Object
{
    protected $uri = "insuranceprices/";

    protected $relations = [
        "type" => TypesObject::class,
    ];
}