<?php

namespace Domains\Arvanvod\Entities;

use App\Http\Controllers\UuIdTrait;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Relations\BelongsTo;

class Arvanvod extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    protected $table = 'arvanvod';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'link',
        'description',
        'file_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = UuIdTrait::randomStrings(8);
        });
    }

    /**
     * @return BelongsTo
     */
    public function arvanvod()
    {
        return $this->belongsTo(User::class,'id','id');
    }

}
