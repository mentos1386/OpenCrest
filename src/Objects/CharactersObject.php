<?php

namespace OpenCrest\Objects;

use OpenCrest\Objects\Characters\BlockedObject;
use OpenCrest\Objects\Characters\CapsuleerObject;
use OpenCrest\Objects\Characters\Chat\ChannelsObject;
use OpenCrest\Objects\Characters\ContactsObject;
use OpenCrest\Objects\Characters\FittingsObject;
use OpenCrest\Objects\Characters\LocationObject;
use OpenCrest\Objects\Characters\MailObject;
use OpenCrest\Objects\Characters\Navigation\WaypointsObject;
use OpenCrest\Objects\Characters\NotificationsObject;
use OpenCrest\Objects\Characters\PrivateObject;
use OpenCrest\Objects\Characters\VivoxObject;

class CharactersObject extends Object
{

    protected $uri = "characters/";

    protected $oauth = TRUE;

    protected $relations = [
        "standings"     => StandingsObject::class,
        "bloodLine"     => BloodLinesObject::class,
        "waypoints"     => WaypointsObject::class,
        "private"       => PrivateObject::class,
        "channels"      => ChannelsObject::class,
        "blocked"       => BlockedObject::class,
        "fittings"      => FittingsObject::class,
        "contacts"      => ContactsObject::class,
        "location"      => LocationObject::class,
        "mail"          => MailObject::class,
        "capsuleer"     => CapsuleerObject::class,
        "vivox"         => VivoxObject::class,
        "notifications" => NotificationsObject::class,
        "corporation"   => CorporationsObject::class,
        "race"          => RacesObject::class,
        "accounts"      => AccountsObject::class,
    ];
}