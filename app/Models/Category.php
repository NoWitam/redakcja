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

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public static function boot()
    {
        parent::boot();

        static::observe(SlugObserver::class);
    }
}
