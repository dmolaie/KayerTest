<?php


namespace Domains\News\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class NewsNotFoundException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND);
    }

}