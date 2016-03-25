# OpenCrest
[![Latest Stable Version](https://poser.pugx.org/mentos1386/opencrest/v/stable)](https://packagist.org/packages/mentos1386/opencrest) [![Total Downloads](https://poser.pugx.org/mentos1386/opencrest/downloads)](https://packagist.org/packages/mentos1386/opencrest) [![Latest Unstable Version](https://poser.pugx.org/mentos1386/opencrest/v/unstable)](https://packagist.org/packages/mentos1386/opencrest) [![License](https://poser.pugx.org/mentos1386/opencrest/license)](https://packagist.org/packages/mentos1386/opencrest)[![Documentation Status](https://readthedocs.org/projects/opencrest/badge/?version=latest)](http://opencrest.readthedocs.org/en/latest/?badge=latest)

EVE Online CREST PHP Library


Open Source PHP Library for using EVE Online CREST API

Shouldn't be used for production just yet, as CREST API lacks data. It's better to use XML API for now.

## How to use

```php
use OpenCrest\OpenCrest;
$token = "Access Token you got from OAuth authentication";
OpenCrest::setToken($token);

// Get list of constellations
$constellations = OpenCrest::Constellations->get();

// You can then foreach list to get more details on constellations
foreach ($constellations as $constellation) {
    // This will make show($id) request for every object.
    //Beware, that OpenCrest::[something]->get() can be very long and that making get request on every item 
    // will make alot of reqquests.
    var_dump($constellation->get);

}
// Get specific constellation
$id = 20000002;
$constellation = OpenCrest::Constellations->show($id);

// Same with planets
$id = 40000017;
$planet =OpenCrest::Planets->show($id);

// Or alliances
$id = 99000006;
$alliance = OpenCrest::Alliances->show($id)->description;

// Get list of alliances
$alliances = OpenCrest::Alliances->get();

// Go to specific page
$alliances = OpenCrest::Alliances->page(2);

// Go to next page
// Using allrady recived object to know which page is next.
$alliances = $alliances->nextPage();

// Go to previouse page
// Using allrady recived object to know which page is previous.
$alliances = $alliances->previousPage();

```

## Endpoints Documentation
[Documentation](https://github.com/mentos1386/OpenCrest/blob/master/src/Endpoints/README.md)

## Example output
`var_dump(OpenCrest::Alliances->show(99000006);` which calls url https://public-crest.eveonline.com/alliances/99000006/

```
object(OpenCrest\Endpoints\Objects\AlliancesObject)[212]
  protected 'endpoint' => 
    object(OpenCrest\Endpoints\AlliancesEndpoint)[214]
      public 'uri' => string 'alliances/99000006/' (length=19)
      public 'object' => string 'OpenCrest\Endpoints\Objects\AlliancesObject' (length=43)
      public 'client' => 
        object(GuzzleHttp\Client)[23]
          private 'config' => 
            array (size=8)
              ...
      protected 'relationId' => null
      protected 'oauth' => boolean false
      protected 'token' => string 'Access Token you got from OAuth authentication' (length=87)
      protected 'routes' => 
        array (size=2)
          0 => string 'get' (length=3)
          1 => string 'show' (length=4)
      private 'publicBase' (OpenCrest\Endpoints\Endpoint) => string 'https://public-crest.eveonline.com/' (length=35)
      private 'oauthBase' (OpenCrest\Endpoints\Endpoint) => string 'https://crest-tq.eveonline.com/' (length=31)
  
  // Data recived from request, you can access it as $object->startDate, $object->description
  // or to make show($id) request on relationship $executorCorporation = $object->executorCorporation->get();
  protected 'attributes' => 
    array (size=14)
      'startDate' => string '2010-11-04T13:11:00' (length=19)
      'corporationsCount' => int 2
      'description' => string '<font size="12" color="#bfffffff">No Friend nor Ally we are Mercenaries. <br><br>Lurking in the shadows hunting our latest victims for nothing more than blood money. Death to the highest bidder... Assassination by any means available.<br><br>The only question left to ask yourself is will you be next?<br><br><i>Everto Rex Regis Open For Buisness</i><br><br>[Alliance Diplo] Join: 666 PUB<br></font><font size="12" color="#ffffa600"><loc><a href="showinfo:1384//1265238237">AnatomicalFaith</a></loc><br><br></fon'... (length=975)
      'executorCorporation' => 
        object(OpenCrest\Endpoints\Objects\CorporationsObject)[226]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CorporationsEndpoint)[227]
              ...
          protected 'attributes' => 
            array (size=6)
              ...
          protected 'relations' => 
            array (size=0)
              ...
          protected 'id' => int 1983708877
      'corporationsCount_str' => string '2' (length=1)
      'deleted' => boolean false
      'creatorCorporation' => 
        object(OpenCrest\Endpoints\Objects\CorporationsObject)[219]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CorporationsEndpoint)[243]
              ...
          protected 'attributes' => 
            array (size=6)
              ...
          protected 'relations' => 
            array (size=0)
              ...
          protected 'id' => int 665335352
      'url' => string 'http://evertorexregis.net' (length=25)
      'id_str' => string '99000006' (length=8)
      'creatorCharacter' => 
        object(OpenCrest\Endpoints\Objects\CharactersObject)[228]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CharactersEndpoint)[259]
              ...
          protected 'attributes' => 
            array (size=7)
              ...
          protected 'relations' => 
            array (size=16)
              ...
          protected 'id' => int 549618368
      'corporations' => 
        object(OpenCrest\Endpoints\Objects\ListObject)[244]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CorporationsEndpoint)[291]
              ...
          protected 'attributes' => 
            array (size=3)
              ...
          protected 'relations' => 
            array (size=0)
              ...
          protected 'id' => null
      'shortName' => string '666' (length=3)
      'id' => int 99000006
      'name' => string 'Everto Rex Regis' (length=16)
      
  // Relations which you can load with $object->relation->get();
  protected 'relations' => 
    array (size=4)
      'executorCorporation' => string 'OpenCrest\Endpoints\CorporationsEndpoint' (length=40)
      'creatorCorporation' => string 'OpenCrest\Endpoints\CorporationsEndpoint' (length=40)
      'corporations' => string 'OpenCrest\Endpoints\CorporationsEndpoint' (length=40)
      'creatorCharacter' => string 'OpenCrest\Endpoints\CharactersEndpoint' (length=38)
  protected 'id' => int 99000006
```

## License
The MIT License (MIT). Please see [License File](https://github.com/mentos1386/OpenCrest/blob/master/LICENSE) for more information.
