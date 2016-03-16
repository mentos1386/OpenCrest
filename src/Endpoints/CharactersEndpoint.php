<?php

namespace OpenCrest\Endpoints;

use OpenCrest\Endpoints\Characters\BlockedEndpoint;
use OpenCrest\Endpoints\Characters\CapsuleerEndpoint;
use OpenCrest\Endpoints\Characters\ChannelsEndpoint;
use OpenCrest\Endpoints\Characters\ContactsEndpoint;
use OpenCrest\Endpoints\Characters\FittingsEndpoint;
use OpenCrest\Endpoints\Characters\LocationEndpoint;
use OpenCrest\Endpoints\Characters\MailEndpoint;
use OpenCrest\Endpoints\Characters\NotificationsEndpoint;
use OpenCrest\Endpoints\Characters\PrivateEndpoint;
use OpenCrest\Endpoints\Characters\VivoxEndpoint;
use OpenCrest\Endpoints\Characters\WaypointsEndpoint;
use OpenCrest\Endpoints\Objects\Characters\BlockedObject;
use OpenCrest\Endpoints\Objects\Characters\ChannelsObject;
use OpenCrest\Endpoints\Objects\Characters\ContactsObject;
use OpenCrest\Endpoints\Objects\Characters\FittingsObject;
use OpenCrest\Endpoints\Objects\Characters\LocationObject;
use OpenCrest\Endpoints\Objects\Characters\MailObject;
use OpenCrest\Endpoints\Objects\Characters\NotificationsObject;
use OpenCrest\Endpoints\Objects\Characters\PrivateObject;
use OpenCrest\Endpoints\Objects\Characters\VivoxObject;
use OpenCrest\Endpoints\Objects\Characters\WaypointsObject;
use OpenCrest\Endpoints\Objects\CharactersObject;
use OpenCrest\Endpoints\Objects\ListObject;

class CharactersEndpoint extends Endpoint
{
    /**
     * @var string
     */
    public $uri = "characters/";
    /**
     * @var
     */
    public $object = CharactersObject::class;
    /**
     * @var bool
     */
    protected $oauth = True;

    /**
     * @param $relationsId
     * @return BlockedObject|ListObject
     */
    public function getBlocked($relationsId)
    {
        return (new BlockedEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return CapsuleerEndpoint|ListObject
     */
    public function getCapsuleer($relationsId)
    {
        return (new CapsuleerEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return ChannelsObject|ListObject
     */
    public function getChannels($relationsId)
    {
        return (new ChannelsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return ContactsObject|ListObject
     */
    public function getContacts($relationsId)
    {
        return (new ContactsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @param $data
     * @return ContactsObject
     */
    public function postContacts($relationsId, $data)
    {
        return (new ContactsEndpoint($relationsId))->post($data);
    }

    /**
     * @param $relationsId
     * @param $data
     * @return ContactsObject
     */
    public function deleteContacts($relationsId, $data)
    {
        return (new ContactsEndpoint($relationsId))->delete($data);
    }

    /**
     * @param $relationsId
     * @return FittingsObject|ListObject
     */
    public function getFittings($relationsId)
    {
        return (new FittingsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return LocationObject|ListObject
     */
    public function getLocation($relationsId)
    {
        return (new LocationEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return MailObject|ListObject
     */
    public function getMail($relationsId)
    {
        return (new MailEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return NotificationsObject|ListObject
     */
    public function getNotifications($relationsId)
    {
        return (new NotificationsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return PrivateObject|ListObject
     */
    public function getPrivate($relationsId)
    {
        return (new PrivateEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return VivoxObject|ListObject
     */
    public function getVivox($relationsId)
    {
        return (new VivoxEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return WaypointsObject|ListObject
     */
    public function getWaypoints($relationsId)
    {
        return (new WaypointsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @param $data
     * @return WaypointsObject
     */
    public function postWaypoints($relationsId, $data)
    {
        return (new WaypointsEndpoint($relationsId))->post($data);
    }
}