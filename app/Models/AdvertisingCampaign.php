<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class AdvertisingCampaign extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('date_from', '<=', Carbon::now())
            ->where(function ($query) {
                $query->where('date_to', '>=', Carbon::now())
                    ->orWhereNull('date_to');
            });
    }
}
