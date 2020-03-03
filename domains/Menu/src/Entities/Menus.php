<?php

namespace Domains\Menu\Entities;

use Domains\Article\Entities\Article;
use Domains\News\Entities\News;
use Domains\User\Entities\User;
use Events;
use Illuminate\Database\Eloquent\Model;
use Menu;

class Menus extends Model
{
    protected $table = 'menus';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'alias',
        'type',
        'link',
        'language',
        'publish_date',
        'editor_id',
        'publisher_id',
        'parent_id',
        'prority',
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id', 'id');
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Menus::class, 'parent_id', 'id');

    }

    public function child()
    {
        return $this->hasOne(Menus::class, 'parent_id', 'id');
    }

    public function events()
    {
        return $this->morphedByMany(Events::class, 'menuble');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'menuble');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'menuble');
    }
}
