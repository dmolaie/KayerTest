<?php


namespace Domains\SmsRegister\Entities;

use Jenssegers\Mongodb\Eloquent\Model;


class SmsRegister extends Model
{
    protected $connection = 'mongodb';
    protected $dates = ['birthDate'];

}