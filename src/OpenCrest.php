<?php namespace OpenCrest;

use OpenCrest\Endpoints\AlliancesEndpoint;
use OpenCrest\Endpoints\CharactersEndpoint;
use OpenCrest\Endpoints\CorporationsEndpoint;
use OpenCrest\Endpoints\TypesEndpoint;

class OpenCrest
{
    protected $token;

    // Endpoints
    public $alliances;
    public $characters;
    public $corporations;
    public $types;

    /**
     * OpenCrest constructor.
     *
     * @param $token
     */
    public function __construct($token = "")
    {
        $this->token = $token;

        $this->alliances = new AlliancesEndpoint($token);
        $this->characters = new CharactersEndpoint($token);
        $this->corporations = new CorporationsEndpoint($token);
        $this->types = new TypesEndpoint($token);

    }
}