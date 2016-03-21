<?php

namespace OpenCrest\Objects;

use OpenCrest\Endpoints\AccountsEndpoint;
use OpenCrest\Endpoints\BloodLinesEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\RacesEndpoint;
use OpenCrest\Endpoints\StandingsEndpoint;
use OpenCrest\Endpoints\Characters\WaypointsEndpoint;
use OpenCrest\Endpoints\Characters\PrivateEndpoint;
use OpenCrest\Endpoints\Characters\ChannelsEndpoint;
use OpenCrest\Endpoints\Characters\BlockedEndpoint;
use OpenCrest\Endpoints\Characters\FittingsEndpoint;
use OpenCrest\Endpoints\Characters\ContactsEndpoint;
use OpenCrest\Endpoints\Characters\LocationEndpoint;
use OpenCrest\Endpoints\Characters\MailEndpoint;
use OpenCrest\Endpoints\Characters\CapsuleerEndpoint;
use OpenCrest\Endpoints\Characters\VivoxEndpoint;
use OpenCrest\Endpoints\Characters\NotificationsEndpoint;

class CharactersObject extends Object
{
    protected function setRelations()
    {
        $this->relations = [
            "standings"     => StandingsEndpoint::class,
            "bloodLine"     => BloodLinesEndpoint::class,
            "waypoints"     => WaypointsEndpoint::class,
            "private"       => PrivateEndpoint::class,
            "channels"      => ChannelsEndpoint::class,
            "blocked"       => BlockedEndpoint::class,
            "fittings"      => FittingsEndpoint::class,
            "contacts"      => ContactsEndpoint::class,
            "location"      => LocationEndpoint::class,
            "mail"          => MailEndpoint::class,
            "capsuleer"     => CapsuleerEndpoint::class,
            "vivox"         => VivoxEndpoint::class,
            "notifications" => NotificationsEndpoint::class,
            "corporation"   => CorporationsEndpoint::class,
            "race"          => RacesEndpoint::class,
            "accounts"      => AccountsEndpoint::class,
        ];
    }
}