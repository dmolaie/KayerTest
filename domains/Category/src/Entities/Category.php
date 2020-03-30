<?php

namespace Domains\Category\Entities;

use Domains\Event\Entities\Event;
use Domains\Menu\Entities\Menus;
use Domains\News\Entities\News;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en',
        'name_fa',
        'type',
        'parent_id',
        'slug',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');

    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'categorible');
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'categorible');
    }

    public function menus()
    {
        return $this->morphToMany(Menus::class, 'menuable')->withTimestamps();
    }

}
