<?php

namespace OpenCrest\Exceptions;
class OAuthException extends \Exception
{
    protected $message = "OAuth Access Token not provided, but required for this request!";
}