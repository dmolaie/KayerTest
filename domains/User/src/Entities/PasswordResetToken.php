<?php

namespace Domains\User\Entities;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'national_code',
        'mobile',
        'token',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->token = mt_rand(11111, 99999);
        });
    }
}
