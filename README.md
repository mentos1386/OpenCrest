# OpenCrest
EVE Online CREST PHP Library


Open Source PHP Library for using EVE Online CREST API
Inspired by Laravel Elequent

## How to use

```php
$token = //oauth token, not used atm, as all data is public
$api = new OpenCrest\OpenCrest($token);


$constellations = $api->constellations->all();

$id = 20000002;
$constellations = $api->constellations->show($id);

$id = 40000017;
$planet = $api->planets->show($id);

$id = 99000006;
$alliances = $api->alliances->show($id)->;

$alliances = $api->alliances->all();

$alliances = $api->alliances->page(2);

// Using allrady recived object to know which page is next.
$alliances = $alliances->nextPage();

// Using allrady recived object to know which page is previous.
$alliances = $alliances->previousPage();

```

## Example output
`var_dump($api->alliances->show(99000006);` which calls url https://public-crest.eveonline.com/alliances/99000006/

```
object(OpenCrest\Endpoints\Objects\AlliancesObject)[151]
  public 'id' => int 99000006
  public 'name' => string 'Everto Rex Regis' (length=16)
  public 'shortName' => string '666' (length=3)
  public 'description' => string '<font size="12" color="#bfffffff">No Friend nor Ally we are Mercenaries. <br><br>Lurking in the shadows hunting our latest victims for nothing more than blood money. Death to the highest bidder... Assassination by any means available.<br><br>The only question left to ask yourself is will you be next?<br><br><i>Everto Rex Regis Open For Buisness</i><br><br>[Alliance Diplo] Join: 666 PUB<br></font><font size="12" color="#ffffa600"><loc><a href="showinfo:1384//1265238237">AnatomicalFaith</a></loc><br><br></fon'... (length=975)
  public 'startDate' => string '2010-11-04T13:11:00' (length=19)
  public 'corporationsCount' => int 2
  public 'executorCorporation' => 
    object(OpenCrest\Endpoints\Objects\CorporationsObject)[142]
      public 'id' => int 1983708877
      public 'name' => string 'Demonic Imperial Holding' (length=24)
      public 'logo' => 
        array (size=4)
          '32x32' => 
            array (size=1)
              ...
          '64x64' => 
            array (size=1)
              ...
          '128x128' => 
            array (size=1)
              ...
          '256x256' => 
            array (size=1)
              ...
      public 'isNPC' => boolean false
      public 'href' => string 'https://public-crest.eveonline.com/corporations/1983708877/' (length=59)
  public 'creatorCharacter' => 
    object(OpenCrest\Endpoints\Objects\CharactersObject)[145]
      public 'id' => int 549618368
      public 'name' => string 'Drako Zay' (length=9)
      public 'isNPC' => boolean false
      public 'capsuleer' => 
        array (size=1)
          'href' => string 'https://public-crest.eveonline.com/characters/549618368/capsuleer/' (length=66)
      public 'portrait' => 
        array (size=4)
          '32x32' => 
            array (size=1)
              ...
          '64x64' => 
            array (size=1)
              ...
          '128x128' => 
            array (size=1)
              ...
          '256x256' => 
            array (size=1)
              ...
      public 'href' => string 'https://public-crest.eveonline.com/characters/549618368/' (length=56)
  public 'creatorCorporation' => 
    object(OpenCrest\Endpoints\Objects\CorporationsObject)[152]
      public 'id' => int 665335352
      public 'name' => string 'Demonic Empire' (length=14)
      public 'logo' => 
        array (size=4)
          '32x32' => 
            array (size=1)
              ...
          '64x64' => 
            array (size=1)
              ...
          '128x128' => 
            array (size=1)
              ...
          '256x256' => 
            array (size=1)
              ...
      public 'isNPC' => boolean false
      public 'href' => string 'https://public-crest.eveonline.com/corporations/665335352/' (length=58)
  public 'corporations' => 
    object(stdClass)[156]
      public 0 => 
        object(OpenCrest\Endpoints\Objects\CorporationsObject)[153]
          public 'id' => int 665335352
          public 'name' => string 'Demonic Empire' (length=14)
          public 'logo' => 
            array (size=4)
              ...
          public 'isNPC' => boolean false
          public 'href' => string 'https://public-crest.eveonline.com/corporations/665335352/' (length=58)
      public 1 => 
        object(OpenCrest\Endpoints\Objects\CorporationsObject)[158]
          public 'id' => int 1983708877
          public 'name' => string 'Demonic Imperial Holding' (length=24)
          public 'logo' => 
            array (size=4)
              ...
          public 'isNPC' => boolean false
          public 'href' => string 'https://public-crest.eveonline.com/corporations/1983708877/' (length=59)
  public 'href' => null
  public 'url' => string 'http://evertorexregis.net' (length=25)
  public 'deleted' => boolean false
```

Data is returned as object, with whom you can interact and in feature you will be able to get additional data from objects that it is in relationship with.

## License
The MIT License (MIT). Please see [License File](https://github.com/mentos1386/OpenCrest/blob/master/LICENSE) for more information.