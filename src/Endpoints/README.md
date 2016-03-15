#Endpoints Documentation

Documentation on how to use endpoints, what they return, and if they are implemented.

If there is `AUTH` in the title, that means that OAuth token is required to use the Endpoint.

You can use endpoints with `OpenCrest::[EndpointName]->get();` which gets list of items or `OpenCrest::[EndpointName]->show([ID]);` which returns specific item.

Relations can be loaded after getting object with (`get()` used with relationships returns specific or list of items, depending on relationship):
```php
$characterCorporation = OpenCrest::Characters()->show(ID)->corporation->get();
```

##Accounts `accounts/` `AUTH`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not found`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Not third party enabled`|

Relations:
```
    No relations
```

##Alliances `alliances/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "executorCorporation" => CorporationsEndpoint,
    "creatorCorporation"  => CorporationsEndpoint,
    "corporations"        => CorporationsEndpoint,
    "creatorCharacter"    => CharactersEndpoint,
```

##Bloodlines `bloodlines/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not found`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Route not found`|

Relations:
```
    No relations
```

##Characters `characters/` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| GET           |`Authentication scope needed`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

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

##Characters/Blocked `characters/[ID]/blocked` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Authentication scope needed`|


Relations:
```
    No relations
```

##Characters/Capsuleer `characters/[ID]/capsuleer` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Not Third Party Enabled`|

Relations:
```
    No relations
```

##Characters/Channels `characters/[ID]/chat/channels/` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    No relations
```

##Characters/Contacts `characters/[ID]/contacts/` 
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|`characterContactsWrite`|
| PUT           |`WIP`|`characterContactsWrite`|
| SHOW          |`Works`|`characterContactsRead`|

Relations:
```
    No relations
```

##Characters/Fittings `characters/[ID]/fittings/` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|`characterFittingsWrite`|
| PUT           |`WIP`|`characterFittingsWrite`|
| SHOW          |`Works`|`characterFittingsRead`|

Relations:
```
    No relations
```

##Characters/Location `characters/[ID]/location/` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|`characterLocationRead`|

Relations:
```
    No relations
```

##Characters/Mail `characters/[ID]/mail/` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Authentication scope needed`|

Relations:
```
    No relations
```

##Characters/Notifications `characters/[ID]/notifications` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    No relations
```

##Characters/Private `characters/[ID]/private` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Not Third Party Enabled`|

Relations:
```
    No relations
```

##Characters/Vivox `characters/[ID]/vivox` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Not Third Party Enabled`|

Relations:
```
    No relations
```

##Characters/Navigation/Waypoints `characters/[ID]/navigation/waypoints/` `AUTH`
| Route         | Status        |Scope|
| ------------- |:-------------:|:-------------:|
| POST           |`WIP`|`characterNavigationWrite`|
| PUT           |`WIP`|`characterNavigationWrite`|
| SHOW          |`Works`|
Relations:
```
    No relations
```

##Constellations `constellations/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "systems" => SystemsEndpoint,
    "regions" => RegionsEndpoint,
```

##Corporations `corporations/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    No realations
```

##Crest `/`
| Route         | Status        |Alias|
| ------------- |:-------------:|:-------------:|
| GET           |`Works`|`status()`|

Relations:
```
    No relations
```

##Dogma `dogma/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not found`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`??`|

Relations:
```
    "attributes" => AttributesEndpoint,
    "effects"    => EffectsEndpoint,
```

##Dogma/Attributes `dogma/attributes`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    No relations
```

##Dogma/Effects `dogma/effects`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "dischargeAttributeID" => Dogma/AttributesEndpoint,
    "durationAttributeID"  => Dogma/AttributesEndpoint,
```

##Planets `planets/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not found`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`InternalServerError`|

Relations:
```
    "system" => SystemsEndpoint,
```

##Races `races/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not found`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Route not found`|

Relations:
```
    No relations
```

##Regions `regions/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "constellations" => ConstellationsEndpoint,
```

##Standings `standings/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Route not found`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Route not found`|

Relations:
```
    No relations
```

##Systems `solarsystems/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "constellation" => ConstellationsEndpoint,
    "sovereignty"   => AlliancesEndpoint,
    "stats"         => Systems/StatsEndpoint,
```

##Systems/Stats `solarsystems/stats/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Not Third Party Enabled`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Route not found`|

Relations:
```
    No relations
```

##Tournaments `tournaments/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works/Not Third Party Enabled`|

Relations:
```
    "series" => WIP
```

##Types `types/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "dogma" => DogmaEndpoint,
```

##Wars `wars/`
| Route         | Status        |
| ------------- |:-------------:|
| GET           |`Works`|
| POST           |`WIP`|
| PUT           |`WIP`|
| SHOW          |`Works`|

Relations:
```
    "aggressor" => CorporationsEndpoint,
    "defender"  => CorporationsEndpoint
    "killmails" => WIP
```