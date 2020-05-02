<?php

namespace Domains\Media\Entities;

use App\Http\Controllers\UuIdTrait;
use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\Menu\Entities\Menus;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    protected $table = 'media';
    use SoftDeletes;

    protected $softDelete = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_title',
        'category_id',
        'publish_date',
        'status',
        'slug',
        'province_id',
        'editor_id',
        'publisher_id',
        'language',
        'uuid',
        'type',
        'abstract',
        'description',
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

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorible')->withPivot('is_main')->withTimestamps();
    }

    public function menus()
    {
        return $this->morphToMany(Menus::class, 'menuable')->withTimestamps();
    }

    public function parent()
    {
        return $this->belongsTo(Media::class);

    }

    public function child()
    {
        return $this->hasOne(Media::class, 'parent_id', 'id');
    }
}