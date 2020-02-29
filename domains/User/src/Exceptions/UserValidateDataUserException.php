<?php

namespace Domains\User\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserValidateDataUserException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND);
    }

}
