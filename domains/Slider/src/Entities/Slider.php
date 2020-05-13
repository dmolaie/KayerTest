<?php

namespace Domains\Slider\Entities;

use App\Http\Controllers\UuIdTrait;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $softDelete = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_title',
        'publish_date',
        'status',
        'province_id',
        'editor_id',
        'publisher_id',
        'language',
        'uuid',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = UuIdTrait::randomStrings(8);
        });
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id', 'id');
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function parent()
    {
        return $this->belongsTo(Slider::class);

    }

    public function child()
    {
        return $this->hasOne(Slider::class, 'parent_id', 'id');
    }
}
