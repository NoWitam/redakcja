<?php

namespace App\Models;

use App\Interfaces\Viewable;
use App\Managers\AdvertisingCampaignManager;
use App\Traits\HasViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSection extends Model implements Viewable
{
    use HasFactory, HasViews;
}
