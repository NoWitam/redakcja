<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('articles');

Route::get('/kategorie', [CategoryController::class, 'index'])->name('categories');

Route::get('/kategorie/{category:slug}', [CategoryController::class, 'show'])->name('category');

Route::get('/kategorie/{category:slug}/{subcategory:slug}', [CategoryController::class, 'showSub'])->name('subcategory');

Route::get('/artykuly/{article:slug}', [ArticleController::class, 'show'])->name('article');

Route::get('/zaloguj', function() {
    Auth::login(User::find(1));
    //dd(Session::get('reason'));
})->name('login');

Route::get('test', function () {
    $article = Article::find(1);
    $article->reactions()->select(DB::raw('COUNT(*) as count'))->groupBy('type')->get();
});
