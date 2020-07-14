<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class AttachmentFileErrorException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
