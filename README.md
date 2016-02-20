# OpenCrest
[![Latest Stable Version](https://poser.pugx.org/mentos1386/opencrest/v/stable)](https://packagist.org/packages/mentos1386/opencrest) [![Total Downloads](https://poser.pugx.org/mentos1386/opencrest/downloads)](https://packagist.org/packages/mentos1386/opencrest) [![Latest Unstable Version](https://poser.pugx.org/mentos1386/opencrest/v/unstable)](https://packagist.org/packages/mentos1386/opencrest) [![License](https://poser.pugx.org/mentos1386/opencrest/license)](https://packagist.org/packages/mentos1386/opencrest)

EVE Online CREST PHP Library


Open Source PHP Library for using EVE Online CREST API
Inspired by Laravel Elequent

## How to use

```php
$token = //oauth token, not used atm, as all data is public
$api = new OpenCrest\OpenCrest($token);

// Get list of constellations
$constellations = $api->constellations->all();

// You can then foreach list to get more details on constellations
foreach ($constellations as $constellation) {
    // This will make show($id) request for every object.
    //Beware, that $api->[something]->all() can be very long and that will make alot of reqquests.
    var_dump($constellation->get);

}
// Get specific constellation
$id = 20000002;
$constellation = $api->constellations->show($id);

// Same with planets
$id = 40000017;
$planet = $api->planets->show($id);

// Or alliances
$id = 99000006;
$alliance = $api->alliances->show($id)->description;

// Get list of alliances
$alliances = $api->alliances->all();

// Go to specific page
$alliances = $api->alliances->page(2);

// Go to next page
// Using allrady recived object to know which page is next.
$alliances = $alliances->nextPage();

// Go to previouse page
// Using allrady recived object to know which page is previous.
$alliances = $alliances->previousPage();

```

## Example output
`var_dump($api->alliances->show(99000006);` which calls url https://public-crest.eveonline.com/alliances/99000006/

```
object(OpenCrest\Endpoints\Objects\AlliancesObject)[182]
  protected 'endpoint' => 
    object(OpenCrest\Endpoints\AlliancesEndpoint)[240]
      public 'uri' => string 'alliances/99000006/' (length=19)
      public 'object' => string 'OpenCrest\Endpoints\Objects\AlliancesObject' (length=43)
      public 'client' => 
        object(GuzzleHttp\Client)[23]
          private 'config' => 
            array (size=8)
              ...
      protected 'oauth' => boolean false
      protected 'token' => 
        object(League\OAuth2\Client\Token\AccessToken)[2]
          protected 'accessToken' => string 'BunchOfLettersAndNumbersWritenHereOnlyIfYouSupplyedOauthTokenWhenCreating' (length=87)
          protected 'expires' => int 1455999248
          protected 'refreshToken' => null
          protected 'resourceOwnerId' => null
      private 'publicBase' (OpenCrest\Endpoints\Endpoint) => string 'https://public-crest.eveonline.com/' (length=35)
      private 'oauthBase' (OpenCrest\Endpoints\Endpoint) => string 'https://crest-tq.eveonline.com/' (length=31)
  protected 'attributes' => 
    array (size=14)
      'startDate' => string '2010-11-04T13:11:00' (length=19)
      'corporationsCount' => int 2
      'description' => string '<font size="12" color="#bfffffff">No Friend nor Ally we are Mercenaries. <br><br>Lurking in the shadows hunting our latest victims for nothing more than blood money. Death to the highest bidder... Assassination by any means available.<br><br>The only question left to ask yourself is will you be next?<br><br><i>Everto Rex Regis Open For Buisness</i><br><br>[Alliance Diplo] Join: 666 PUB<br></font><font size="12" color="#ffffa600"><loc><a href="showinfo:1384//1265238237">AnatomicalFaith</a></loc><br><br></fon'... (length=975)
      'executorCorporation' => 
        object(OpenCrest\Endpoints\Objects\CorporationsObject)[256]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CorporationsEndpoint)[257]
              ...
          protected 'attributes' => 
            array (size=6)
              ...
          protected 'relations' => 
            array (size=0)
              ...
      'corporationsCount_str' => string '2' (length=1)
      'deleted' => boolean false
      'creatorCorporation' => 
        object(OpenCrest\Endpoints\Objects\CorporationsObject)[241]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CorporationsEndpoint)[273]
              ...
          protected 'attributes' => 
            array (size=6)
              ...
          protected 'relations' => 
            array (size=0)
              ...
      'url' => string 'http://evertorexregis.net' (length=25)
      'id_str' => string '99000006' (length=8)
      'creatorCharacter' => 
        object(OpenCrest\Endpoints\Objects\CharactersObject)[258]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CharactersEndpoint)[289]
              ...
          protected 'attributes' => 
            array (size=7)
              ...
          protected 'relations' => 
            array (size=0)
              ...
      'corporations' => 
        object(OpenCrest\Endpoints\Objects\ListObject)[274]
          protected 'endpoint' => 
            object(OpenCrest\Endpoints\CorporationsEndpoint)[305]
              ...
          protected 'attributes' => 
            array (size=3)
              ...
          protected 'relations' => 
            array (size=0)
              ...
      'shortName' => string '666' (length=3)
      'id' => int 99000006
      'name' => string 'Everto Rex Regis' (length=16)
  protected 'relations' => 
    array (size=4)
      'executorCorporation' => 
        object(OpenCrest\Endpoints\CorporationsEndpoint)[184]
          public 'uri' => string 'corporations/' (length=13)
          public 'object' => string 'OpenCrest\Endpoints\Objects\CorporationsObject' (length=46)
          public 'client' => 
            object(GuzzleHttp\Client)[189]
              ...
          protected 'oauth' => boolean false
          protected 'token' => string '' (length=0)
          private 'publicBase' (OpenCrest\Endpoints\Endpoint) => string 'https://public-crest.eveonline.com/' (length=35)
          private 'oauthBase' (OpenCrest\Endpoints\Endpoint) => string 'https://crest-tq.eveonline.com/' (length=31)
      'creatorCorporation' => 
        object(OpenCrest\Endpoints\CorporationsEndpoint)[195]
          public 'uri' => string 'corporations/' (length=13)
          public 'object' => string 'OpenCrest\Endpoints\Objects\CorporationsObject' (length=46)
          public 'client' => 
            object(GuzzleHttp\Client)[196]
              ...
          protected 'oauth' => boolean false
          protected 'token' => string '' (length=0)
          private 'publicBase' (OpenCrest\Endpoints\Endpoint) => string 'https://public-crest.eveonline.com/' (length=35)
          private 'oauthBase' (OpenCrest\Endpoints\Endpoint) => string 'https://crest-tq.eveonline.com/' (length=31)
      'corporations' => 
        object(OpenCrest\Endpoints\CorporationsEndpoint)[210]
          public 'uri' => string 'corporations/' (length=13)
          public 'object' => string 'OpenCrest\Endpoints\Objects\CorporationsObject' (length=46)
          public 'client' => 
            object(GuzzleHttp\Client)[211]
              ...
          protected 'oauth' => boolean false
          protected 'token' => string '' (length=0)
          private 'publicBase' (OpenCrest\Endpoints\Endpoint) => string 'https://public-crest.eveonline.com/' (length=35)
          private 'oauthBase' (OpenCrest\Endpoints\Endpoint) => string 'https://crest-tq.eveonline.com/' (length=31)
      'creatorCharacter' => 
        object(OpenCrest\Endpoints\CharactersEndpoint)[225]
          public 'uri' => string 'characters/' (length=11)
          public 'object' => string 'OpenCrest\Endpoints\Objects\CharactersObject' (length=44)
          public 'client' => 
            object(GuzzleHttp\Client)[226]
              ...
          protected 'oauth' => boolean false
          protected 'token' => string '' (length=0)
          private 'publicBase' (OpenCrest\Endpoints\Endpoint) => string 'https://public-crest.eveonline.com/' (length=35)
          private 'oauthBase' (OpenCrest\Endpoints\Endpoint) => string 'https://crest-tq.eveonline.com/' (length=31)
```

Data is returned as object, with whom you can interact and in feature you will be able to get additional data from objects that it is in relationship with.

## License
The MIT License (MIT). Please see [License File](https://github.com/mentos1386/OpenCrest/blob/master/LICENSE) for more information.
