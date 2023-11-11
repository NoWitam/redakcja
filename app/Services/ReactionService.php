<?php

namespace App\Services;
use App\Enums\ReactionType;
use App\Interfaces\Reactionable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReactionService
{
    static public function getCountFrom(Reactionable $model)
    {
        $counts = $model->reactions()->select('type', DB::raw('COUNT(*) as count'))->groupBy('type')->get()->keyBy('type.value');

        foreach(ReactionType::cases() as $reaction) {
            $cases[$reaction->value] = [
                'svg' => $reaction->svg(),
                'label' => $reaction->label(),
                'count' => $counts->has($reaction->value) ? $counts[$reaction->value]->count : 0,
                'active' => false
            ];
        }

        if($activeReaction = $model->reactions()->where('user_id', Auth::id())->first()) {
            $cases[$activeReaction->type->value]['active'] = true;
        }

        return $cases;
    }
}
