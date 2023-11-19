<?php

namespace App\Livewire;

use App\Interfaces\Commentable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubComments extends Component
{
    public Commentable $commentable;
    public int $count;
    public int $perPage;
    public bool $addedNew = false;
    public int $commentsCount;
    public string $comment = '';

    public function create()
    {
        $validatedData = $this->validate([
            'comment' => 'required|string|max:1024'
        ]);

        $this->commentable->comments()->create([
            'user_id' => Auth::id(),
            'content' => $validatedData['comment']
        ])->load('user');

        $this->comment = '';
        $this->commentsCount++;
        $this->addedNew = true;
        $this->emit('new-comments');
    }

    public function render()
    {
        return view('livewire.sub-comments');
    }
}
