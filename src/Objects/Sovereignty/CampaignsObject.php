<?php

namespace OpenCrest\Objects\Systems;

use OpenCrest\Objects\AlliancesObject;
use OpenCrest\Objects\ConstellationsObject;
use OpenCrest\Objects\SolarSystemsObject;

class CampaignsObject extends Object
{
    protected $uri = "campaigns/";

    protected $relations = [
        "defender"          => AlliancesObject::class,
        "sourceSolarsystem" => SolarSystemsObject::class,
        "constellation"     => ConstellationsObject::class,
    ];
}