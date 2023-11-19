<?php

namespace App\Models;

use App\Interfaces\Commentable;
use App\Interfaces\Reactionable;
use App\Traits\HasComments;
use App\Traits\HasReactions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements Commentable, Reactionable
{
    use HasFactory, HasComments, HasReactions;

    protected $fillable = [
        'user_id',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
