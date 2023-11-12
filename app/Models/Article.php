<?php

namespace App\Models;

use App\Interfaces\Commentable;
use App\Interfaces\Reactionable;
use App\Observers\SlugObserver;
use App\Traits\HasComments;
use App\Traits\HasReactions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Reactionable, Commentable
{
    use HasFactory, HasReactions, HasComments;

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
        return $this->hasMany(ArticleSection::class);
    }

    public static function boot()
    {
        parent::boot();

        static::observe(SlugObserver::class);
    }
}
