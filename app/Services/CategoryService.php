<?php

namespace App\Services;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryService
{
    static public function getMains()
    {
        return Category::withCount(['ownArticles', 'subArticles'])
        ->whereDoesntHave('mainCategory')
        ->get();

        return Cache::remember('mainCategories', null, function () {
            return Category::withCount(['subCategories', 'articles'])
                    ->whereDoesntHave('mainCategory')
                    ->get();
        });
    }
}
