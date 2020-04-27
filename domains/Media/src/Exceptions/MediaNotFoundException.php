<?php

namespace Domains\Media\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class MediaNotFoundException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND);
    }

}
