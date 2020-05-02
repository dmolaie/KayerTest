<?php

namespace Domains\Attachment\Entities;

use Domains\Role\Entities\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Attachment extends Model
{
    use SoftDeletes;

    protected $table = 'attachments';
    protected $softDelete = true;

    protected $fillable= [
        'class',
        'reference_id',
        'file_name',
        'path',
        'type',
        'title',
        'link',
    ];


}
