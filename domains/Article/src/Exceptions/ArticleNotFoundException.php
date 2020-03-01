<?php

namespace Domains\Article\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ArticleNotFoundException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND);
    }

}
