<?php

namespace Domains\User\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserUnAuthorizedException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_UNAUTHORIZED);
    }

}
