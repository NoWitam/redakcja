<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReaderSessionView extends Model
{
    use HasFactory;

    protected $fillable = [
        'viewable_type',
        'viewable_id',
        'advertising_id'
    ];

    public function viewable()
    {
        $this->morphTo();
    }

    public function advertising()
    {
        $this->belongsTo(File::class);
    }

    public function session()
    {
        $this->belongsTo(ReaderSession::class, 'reader_session_id');
    }
}
