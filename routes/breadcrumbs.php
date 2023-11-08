<?php

use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(Config::get('app.name'), route('home'));
});

// Home > Kategorie
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Kategorie', route('categories'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('categories');
    $trail->push($category->name, route('category', ['category' => $category->slug]), ['description' => $category->description]);
});

// Home > Blog > [Category] > [Subcategory]
Breadcrumbs::for('subcategory', function (BreadcrumbTrail $trail, string $category, Category $subCategory) {
    $trail->parent('category', Category::where('slug', $category)->first());
    $trail->push($subCategory->name, route('subcategory', ['category' => $category, 'subcategory' => $subCategory->slug]), ['description' => $subCategory->description]);
});
