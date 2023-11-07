<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('app.categories', [
            'categories' => CategoryService::getMains()
        ]);
    }

    public function show(Category $category)
    {
        return view('app.category', [
            'category' => $category,
            'subCategories' => $category->subCategories()
                                        ->withCount('articles')->get(),
            'articles' => $category->articles()->paginate(12)
        ]);
    }

    public function showSub(string $category, Category $subCategory)
    {
        return view('app.category', [
            'articles' => $subCategory->articles()->paginate(12)
        ]);
    }

}
