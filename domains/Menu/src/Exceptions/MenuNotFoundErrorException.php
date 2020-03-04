<?php

namespace Domains\Menu\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class MenuNotFoundErrorException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND);
    }

}
