<?php

namespace Domains\Category\Entities;

use Domains\Events\Entities\Events;
use Domains\News\Entities\News;
use Illuminate\Database\Eloquent\Model;
use Menu;

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
        return $this->morphedByMany(Events::class, 'categorible');
    }

    public function menus()
    {
        return $this->morphToMany(Menu::class, 'menuable')->withTimestamps();
    }

}
