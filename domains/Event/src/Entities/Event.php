<?php

namespace Domains\Event\Entities;

use App\Http\Controllers\UuIdTrait;
use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Menu;

class Event extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'abstract',
        'description',
        'category_id',
        'publish_date',
        'event_start_date',
        'event_end_date',
        'event_start_register_date',
        'event_end_register_date',
        'location',
        'source_link_text',
        'source_link_video',
        'source_link_image',
        'status',
        'province_id',
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

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorible')->withPivot('is_main')->withTimestamps();
    }

    public function menus()
    {
        return $this->morphToMany(Menu::class, 'menuable')->withTimestamps();
    }

    public function parent()
    {
        return $this->belongsTo(Event::class);

    }

    public function child()
    {
        return $this->hasOne(Event::class, 'parent_id', 'id');
    }


}
