<?php

namespace Domains\News\Entities;

use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

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
        'language'
    ];

    public function editor()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
