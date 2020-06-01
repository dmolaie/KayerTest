<?php


namespace Domains\Notify\Entities;

use Jenssegers\Mongodb\Eloquent\Model;


class SmsNotify extends Model
{
    protected $connection = 'mongodb';
}