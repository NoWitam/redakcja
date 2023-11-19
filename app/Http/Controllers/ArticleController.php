<?php

namespace App\Http\Controllers;


use App\Models\AdvertisingCampaign;
use App\Models\Article;
use App\Models\File as FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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
        dump("Article " . $article->name . PHP_EOL . Carbon::now()->format("H:i:s.u"));
        return view('app.article', [
            'article' => $article->load(['sections', 'author'])
        ]);
    }

    public function advertisement(Article $article, int $order)
    {
        $campaignsId = AdvertisingCampaign::active()->get()->pluck('id');

        $advertisement = FileModel::where('fileable_type', AdvertisingCampaign::class)
                    ->whereIn('fileable_id', $campaignsId)
                    ->inRandomOrder()->first();

        $path = storage_path('files/' . $advertisement->id . "." . $advertisement->extension);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        dump("Article section " . $order . " " . $article->name . PHP_EOL . Carbon::now()->format("H:i:s.u"));

        return $response;
    }

}
