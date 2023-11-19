<?php

namespace App\Managers;
use App\Interfaces\Viewable;
use App\Models\ReaderSession;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\File as FileModel;
use App\Models\AdvertisingCampaign;
use Illuminate\Support\Facades\Response;

class AdvertisingCampaignManager
{
    private ReaderSession $readerSession;
    private array $lastAdvertising = [];

    private function __construct() {

        $this->readerSession = ReaderSession::create([
            "user_id" => Auth::check() ? Auth::id() : null,
            "ip" => request()->ip() == "127.0.0.1" ? "89.64.38.207" : request()->ip()
        ]);
    }

    public static function initialize()
    {
        if(!Session::has('advertising_campaign')) {
            Session::put('advertising_campaign', new AdvertisingCampaignManager());
        }

        return Session::get('advertising_campaign');
    }

    private function logView(Request $request, string $model)
    {
        if(!isset($request->{$model})) {
            throw new Exception("LogReaderViews error: Request not have {$model} property");
        }

        if(! $request->{$model} instanceof Viewable) {
            throw new Exception("LogReaderViews error: Request property {$model} not implement Viewable");
        }

        $this->readerSession->views()->create([
            'viewable_type' => $request->{$model}::class,
            'viewable_id' => $request->{$model}->id,
            'advertising_id' => $this->isLastAdvertisingBelongsTo($request->{$model}) ? $this->lastAdvertising['id'] : null,
        ]);

    }

    private function hasGeoData()
    {
        return $this->readerSession->continent == null ? false : true;
    }

    private function loadGeoData()
    {
        $response = Http::get("http://ip-api.com/json/{$this->readerSession->ip}?fields=1163481");

        if ($response->successful()) {
            $data = $response->json();

            $this->readerSession->continent = $data['continent'];
            $this->readerSession->country = $data['country'];
            $this->readerSession->region = $data['regionName'];
            $this->readerSession->city = $data['city'];
            $this->readerSession->longitude = $data['lon'];
            $this->readerSession->latitude = $data['lat'];
            $this->readerSession->isMobile = $data['mobile'];

            $this->readerSession->save();
        }
    }

    private function changeUser()
    {
        $this->readerSession->update([
            "user_id" => Auth::id()
        ]);
    }

    private function getAdvertisement($model, bool $force = false)
    {
        if($force || count($this->lastAdvertising) == 0 || $this->lastAdvertising['time'] <= Carbon::now()->timestamp - 8) {

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

            $this->lastAdvertising = [
                'id' => $advertisement->id,
                'time' => Carbon::now()->timestamp,
                'product_type' => $model::class,
                'product_id' => $model->id
            ];

            return $response;
        }

        return response(200);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::initialize()->{$name}(...$arguments);
    }

    private function isLastAdvertisingBelongsTo($model)
    {
        if(count($this->lastAdvertising) == 0) {
            return false;
        }

        if($model::class != $this->lastAdvertising['product_type']) {
            return false;
        }

        if($model->id != $this->lastAdvertising['product_id']) {
            return false;
        }

        return true;
    }
}
