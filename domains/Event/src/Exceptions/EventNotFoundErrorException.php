<?php

namespace Domains\Event\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class EventNotFoundErrorException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND);
    }

}
