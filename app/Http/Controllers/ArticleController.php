<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('app.articles', [
            'articles' => Article::with('author')->paginate(12)
        ]);
    }

    public function show(Article $article)
    {
        return view('app.article', [
            'article' => $article->load(['sections', 'author'])
        ]);
    }

}
