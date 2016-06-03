# OpenCrest
[![Latest Stable Version](https://poser.pugx.org/mentos1386/opencrest/v/stable)](https://packagist.org/packages/mentos1386/opencrest) [![Total Downloads](https://poser.pugx.org/mentos1386/opencrest/downloads)](https://packagist.org/packages/mentos1386/opencrest) [![Latest Unstable Version](https://poser.pugx.org/mentos1386/opencrest/v/unstable)](https://packagist.org/packages/mentos1386/opencrest) [![License](https://poser.pugx.org/mentos1386/opencrest/license)](https://packagist.org/packages/mentos1386/opencrest) [![Documentation Status](https://readthedocs.org/projects/opencrest/badge/?version=latest)](http://opencrest.readthedocs.org/en/latest/?badge=latest) [![Code Climate](https://codeclimate.com/github/mentos1386/OpenCrest/badges/gpa.svg)](https://codeclimate.com/github/mentos1386/OpenCrest) [![Test Coverage](https://codeclimate.com/github/mentos1386/OpenCrest/badges/coverage.svg)](https://codeclimate.com/github/mentos1386/OpenCrest/coverage) [![Build Status](https://travis-ci.org/mentos1386/OpenCrest.svg?branch=master)](https://travis-ci.org/mentos1386/OpenCrest)

EVE Online CREST PHP Library


Open Source PHP Library for using EVE Online CREST API

Shouldn't be used for production just yet, as CREST API lacks data. It's better to use XML API for now.

## How to use

```php
use OpenCrest\OpenCrest;
$token = "Access Token you got from OAuth authentication | Required only for Authenticated resources";
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
$constellation = OpenCrest::Constellations->get($id);

// Same with planets
$id = 40000017;
$planet = OpenCrest::Planets->get($id);

// Or alliances
$id = 99000006;
$alliance = OpenCrest::Alliances->get($id)->description;

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

## License
The MIT License (MIT). Please see [License File](https://github.com/mentos1386/OpenCrest/blob/master/LICENSE) for more information.
