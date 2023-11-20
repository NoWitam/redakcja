<?php

namespace App\Models;

use App\Interfaces\Commentable;
use App\Interfaces\Reactionable;
use App\Interfaces\Viewable;
use App\Observers\SlugObserver;
use App\Traits\HasComments;
use App\Traits\HasReactions;
use App\Traits\HasViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Reactionable, Commentable, Viewable
{
    use HasFactory, HasReactions, HasComments, HasViews;

    protected $casts = [
        'published_at' => 'date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sections()
    {
        return $this->hasMany(ArticleSection::class)->orderBy('order');
    }

    public static function boot()
    {
        parent::boot();

        static::observe(SlugObserver::class);
    }
}
