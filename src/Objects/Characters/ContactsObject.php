<?php

namespace OpenCrest\Objects\Characters;

use OpenCrest\Exceptions\PostDataException;
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

    /**
     * TODO: NEEDS IMPLEMENTATION IN NEW FACTORY
     *
     * @param AlliancesObject|CharactersObject $data
     * @return array
     * @throws PostDataException
     */
    public function makePost($data)
    {
        if ($data instanceof AlliancesObject) {
            $contactType = "Alliance";
        } elseif ($data instanceof CharactersObject) {
            $contactType = "Character";
        } else {
            throw new PostDataException("Creating Contacts, provided data should be Alliance or Character Object");
        }

        return [
            // Standing attribute should be added on Object with Object->setAttribute("standing", Integer);
            "standing"    => $data->getAttribute("standing"),
            "contactType" => $contactType,
            "contact"     => [
                "id_str" => $data->getAttribute("id_str"),
                "href"   => $data->getAttribute("href"),
                "name"   => $data->getAttribute("name"),
                "id"     => $data->getAttribute("id"),
            ],
        ];
    }
}