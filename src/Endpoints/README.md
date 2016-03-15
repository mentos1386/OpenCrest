#Endpoints Documentation

Documentation on how to use endpoints, what they return, and if they are implemented.

##Accounts
Uri: `accounts/`

Auth: `True`

| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not implemented`|
| SHOW          |`Not third party enabled`|

Relations:
```
    No relations
```

##Alliances
Uri: `alliances/`

Auth: `False`

Relations:
```
    "executorCorporation" => CorporationsEndpoint,
    "creatorCorporation"  => CorporationsEndpoint,
    "corporations"        => CorporationsEndpoint,
    "creatorCharacter"    => CharactersEndpoint,
```

##Bloodlines
Uri: `bloodlines/`

Auth: `False`

Relations:
```
    No relations
```

##Characters
Uri: `characters/`

Auth: `True`

Relations:
```
    "standings"     => StandingsEndpoint,
    "bloodLine"     => BloodLinesEndpoint,
    "waypoints"     => Characters/WaypointsEndpoint,
    "private"       => Characters/PrivateEndpoint,
    "channels"      => Characters/ChannelsEndpoint,
    "blocked"       => Characters/BlockedEndpoint,
    "fittings"      => Characters/FittingsEndpoint,
    "contacts"      => Characters/ContactsEndpoint,
    "location"      => Characters/LocationEndpoint,
    "mail"          => Characters/MailEndpoint,
    "capsuleer"     => Characters/CapsuleerEndpoint,
    "vivox"         => Characters/VivoxEndpoint,
    "notifications" => Characters/NotificationsEndpoint,
    "corporation"   => CorporationsEndpoint,
    "race"          => RacesEndpoint,
    "accounts"      => AccountsEndpoint,
```

##Characters/Blocked
Uri: `characters/`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Capsuleer
Uri: `characters/[ID]/capsuleer`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Channels
Uri: `characters/[ID]/chat/channels/`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Contacts
Uri: `characters/[ID]/contacts/`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Fittings
Uri: `characters/[ID]/fittings/`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Location
Uri: `characters/[ID]/location/`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Mail
Uri: `characters/[ID]/mail/`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Notifications
Uri: `characters/[ID]/notifications`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Private
Uri: `characters/[ID]/private`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Vivox
Uri: `characters/[ID]/vivox`

Auth: `True`

Relations:
```
    No relations
```

##Characters/Navigation/Waypoints
Uri: `characters/[ID]/navigation/waypoints/`

Auth: `True`

Relations:
```
    No relations
```

##Constellations
Uri: `constellations/`

Auth: `False`

Relations:
```
    "systems" => SystemsEndpoint,
```

##Corporations
Uri: `corporations/`

Auth: `False`

Relations:
```
    No realations
```

##Crest
Uri: `/`

Auth: `False`

Relations:
```
    No relations
```

##Dogma
Uri: `dogma/`

Auth: `False`

Relations:
```
    "attributes" => AttributesEndpoint,
    "effects"    => EffectsEndpoint,
```

##Dogma/Attributes
Uri: `dogma/attributes`

Auth: `False`

Relations:
```
    No relations
```

##Dogma/Effects
Uri: `dogma/effects`

Auth: `False`

Relations:
```
    "dischargeAttributeID" => Dogma/AttributesEndpoint,
    "durationAttributeID"  => Dogma/AttributesEndpoint,
```

##Planets
Uri: `planets/`

Auth: `False`

Relations:
```
    "system" => SystemsEndpoint,
```

##Races
Uri: `races/`

Auth: `False`

Relations:
```
    No relations
```

##Regions
Uri: `regions/`

Auth: `False`

Relations:
```
    "constellations" => ConstellationsEndpoint,
```

##Standings
Uri: `standings/`

Auth: `False`

Relations:
```
    No relations
```

##Systems
Uri: `solarsystems/`

Auth: `False`

Relations:
```
    "constellations" => ConstellationsEndpoint,
    "sovereignty"    => AlliancesEndpoint,
```

##Tournaments
Uri: `tournaments/`

Auth: `False`

Relations:
```
    No relations
```

##Types
Uri: `types/`

Auth: `False`

Relations:
```
    "dogma" => DogmaEndpoint,
```

##Wars
Uri: `wars/`

Auth: `False`

Relations:
```
    "aggressor" => CorporationsEndpoint,
    "defender"  => CorporationsEndpoint
```