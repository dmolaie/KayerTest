<?php

namespace Domains\Attachment\Entities;

use Domains\Role\Entities\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Attachment extends Model
{
    protected $table = 'attachments';

    protected $fillable= [
        'class',
        'reference_id',
        'file_name',
        'path'
    ];

}
