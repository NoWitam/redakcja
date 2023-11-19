<?php

namespace Database\Seeders;

use App\Models\AdvertisingCampaign;
use App\Models\Article;
use App\Models\ArticleSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdvertisingCampaign::truncate();

        $campaign = AdvertisingCampaign::create([
            "name" => "Kampania 1",
            "date_from" => Carbon::now()
        ]);

        $campaign->images()->create([
            "name" => "Perła chmielowa",
            "extension" => "jpg"
        ]);

        $campaign->images()->create([
            "name" => "Perła mocna",
            "extension" => "jpg"
        ]);

        $campaign = AdvertisingCampaign::create([
            "name" => "Kampania 2",
            "date_from" => Carbon::now()
        ]);

        $campaign->images()->create([
            "name" => "Perła export",
            "extension" => "jpg"
        ]);

        $campaign->images()->create([
            "name" => "Perła miodowa",
            "extension" => "jpg"
        ]);

    }
}
