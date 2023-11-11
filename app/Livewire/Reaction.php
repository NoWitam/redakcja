<?php

namespace App\Livewire;

use App\Models\Article;
use App\Services\ReactionService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reaction extends Component
{
    public Article $article;
    private $xd = '123';
    public function react($reaction)
    {
        if(Auth::check()) {
            if($reaction = \App\Enums\ReactionType::tryFrom($reaction)) {
                $this->article->reactions()->updateOrCreate([
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
        return view('livewire.reaction', [
            'reactions' => ReactionService::getCountFrom($this->article)
        ]);
    }
}
