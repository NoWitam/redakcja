<?php

namespace App\Traits;
use App\Models\Reaction;
use App\Models\ReaderSessionView;

trait HasViews
{
    public function views()
    {
        return $this->morphMany(ReaderSessionView::class, 'viewable');
    }

    public function viewableAdvertisingId()
    {
        return null;
    }

}
