<?php

namespace App\Livewire;

use App\Interfaces\Reactionable;
use App\Services\ReactionService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Reaction extends Component
{
    #[Locked]
    public Reactionable $reactionable;
    #[Locked]
    public bool $small = false;
    public string $id;

    public function react($reaction)
    {
        if(Auth::check()) {
            if($reaction = \App\Enums\ReactionType::tryFrom($reaction)) {
                $this->reactionable->reactions()->updateOrCreate([
                    'user_id' => Auth::id(),
                ], [
                    'type' => $reaction
                ]);
            }
        } else {
            redirect()->route('login')->with('reason', "Zaloguj się aby dzielić się swoimi reakcjami");
        }
    }

    public function render()
    {
        return view($this->small ? 'livewire.reaction-small' : 'livewire.reaction' , [
            'reactions' => ReactionService::getCountFrom($this->reactionable)
        ]);
    }
}
