<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReaderSession extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "user_id",
        "ip",
        "continent",
        "country",
        "region",
        "city",
        "longitude",
        "latitude",
        "isMobile",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views()
    {
        return $this->hasMany(ReaderSessionView::class, 'reader_session_id');
    }
}
