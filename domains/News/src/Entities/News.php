<?php

namespace Domains\News\Entities;

use App\Http\Controllers\UuIdTrait;
use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
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
        'second_title',
        'abstract',
        'description',
        'category_id',
        'publish_date',
        'source_link',
        'status',
        'province_id',
        'editor_id',
        'publisher_id',
        'slug',
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

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorible')->withPivot('is_main')->withTimestamps();
    }

    public function parent()
    {
        return $this->belongsTo(News::class);

    }

    public function child()
    {
        return $this->hasOne(News::class, 'parent_id', 'id');
    }
}
