<?php

namespace App\Http\Controllers;

use App\Managers\AdvertisingCampaignManager;
use App\Models\Article;
use App\Models\ArticleSection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        if(!Auth::check()) {
            Auth::login(User::find(1));
        }

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

    public function advertisement(Article $article, ArticleSection $section)
    {
        return AdvertisingCampaignManager::getAdvertisement($section, $section->order == 1 ? true : false);
    }

}
