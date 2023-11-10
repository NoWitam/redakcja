<?php

namespace App\Models;

use App\Observers\SlugObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subCategories()
    {
        return $this->hasMany(Category::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function allArticles()
    {
        $relation = $this->hasMany(Article::class);
        return $relation->setQuery(
            Article::whereIn('category_id', $this->subCategories()->pluck('id')->push($this->id))->getQuery()
        );
    }

    public function ownArticles()
    {
        return $this->hasMany(Article::class);
    }

    public function subArticles()
    {
        return $this->hasManyThrough(Article::class, Category::class);
    }

    public static function boot()
    {
        parent::boot();

        static::observe(SlugObserver::class);
    }
}
