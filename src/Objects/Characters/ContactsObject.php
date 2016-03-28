<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Objects\AlliancesObject;
use OpenCrest\Objects\CharactersObject;

class ContactsObject extends Object
{
    protected $uri = "contacts/";

    protected $oauth = TRUE;

    protected $relations = [
        "alliance"  => AlliancesObject::class,
        "character" => CharactersObject::class,
    ];

    protected $pattern = [
        "standing"    => "Standing from -10.0 to +10.0 <double>",
        "contactType" => "Type of contact 'Character' or 'Alliance' <string>",
        "watched"     => "Is contacted listed as Watched <boolan>",
        "contact"     => [
            "href"   => "Href to Contact <string>",
            "id"     => "ID of Contact <int>",
            "id_str" => "ID of Contact as String <strig>",
            "name"   => "Name of contact <string>",
        ]
    ];
}