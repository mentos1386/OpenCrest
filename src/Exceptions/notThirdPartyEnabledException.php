<?php

namespace OpenCrest\Exceptions;

class notThirdPartyEnabledException extends Exception
{
    /**
     * @var int
     */
    protected $code = 403;

    /**
     * @return string
     */
    public function errorMessage()
    {
        return "Not Third Party Enabled yet! Message: " . $this->response;
    }
}