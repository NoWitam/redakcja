<?php

namespace App\Traits;
use App\Models\Reaction;

trait HasReactions
{
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
