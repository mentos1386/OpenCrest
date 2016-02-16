<?php namespace OpenCrest;

use OpenCrest\Endpoints\AlliancesEndpoint;

class OpenCrest
{
    protected $token;

    // Endpoints
    public $alliances;

    /**
     * OpenCrest constructor.
     *
     * @param $token
     */
    public function __construct($token = "")
    {
        $this->token = $token;

        $this->alliances = new AlliancesEndpoint($token);
    }
}