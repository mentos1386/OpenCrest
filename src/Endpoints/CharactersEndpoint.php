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
use OpenCrest\Endpoints\Objects\CharactersObject;

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
     * @return mixed|Object
     */
    public function getBlocked($relationsId)
    {
        return (new BlockedEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getCapsuleer($relationsId)
    {
        return (new CapsuleerEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getChannels($relationsId)
    {
        return (new ChannelsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getContacts($relationsId)
    {
        return (new ContactsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getFittings($relationsId)
    {
        return (new FittingsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getLocation($relationsId)
    {
        return (new LocationEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getMail($relationsId)
    {
        return (new MailEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getNotifications($relationsId)
    {
        return (new NotificationsEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getPrivate($relationsId)
    {
        return (new PrivateEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getVivox($relationsId)
    {
        return (new VivoxEndpoint($relationsId))->get();
    }

    /**
     * @param $relationsId
     * @return mixed|Object
     */
    public function getWaypoints($relationsId)
    {
        return (new WaypointsEndpoint($relationsId))->get();
    }
}