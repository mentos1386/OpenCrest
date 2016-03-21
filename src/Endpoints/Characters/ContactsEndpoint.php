<?php

namespace OpenCrest\Endpoints\Characters;

use OpenCrest\Objects\AlliancesObject;
use OpenCrest\Objects\Characters\ContactsObject;
use OpenCrest\Objects\CharactersObject;
use OpenCrest\Exceptions\PostDataException;

class ContactsEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "contacts/";
    /**
     * @var string
     */
    public $object = ContactsObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

    /**
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