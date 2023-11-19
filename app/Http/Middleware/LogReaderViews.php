<?php

namespace App\Http\Middleware;

use App\Managers\AdvertisingCampaignManager;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogReaderViews
{
    private string $model;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $model): Response
    {
        AdvertisingCampaignManager::initialize();

        $this->model = $model;

        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        AdvertisingCampaignManager::logView($request, $this->model);

        if(!AdvertisingCampaignManager::hasGeoData()) {
            AdvertisingCampaignManager::loadGeoData();
        }
    }
}
