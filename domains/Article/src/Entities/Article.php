<?php

namespace Domains\Article\Entities;

use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_title',
        'second_title',
        'third_title',
        'abstract',
        'description',
        'category_id',
        'publish_date',
        'status',
        'slug',
        'province_id',
        'editor_id',
        'publisher_id',
        'language'
    ];

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
        return $this->belongsTo(Article::class);

    }

    public function child()
    {
        return $this->hasOne(Article::class, 'parent_id', 'id');
    }
}
