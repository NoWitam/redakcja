<?php

namespace App\Livewire;

use App\Interfaces\Commentable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public Commentable $commentable;
    public int $perPage;
    public string $sortType = "best";
    public array $sortTypes = [
        "best",
        "newest"
    ];
    public $commentsCount;
    public $newComments;
    public string $comment = '';

    public function mount()
    {
        $this->commentsCount = $this->commentable->comments()->count();
        $this->newComments = new Collection();
    }

    public function create()
    {
        $validatedData = $this->validate([
            'comment' => 'required|string|max:1024'
        ]);

        $this->newComments->prepend(
            $this->commentable->comments()->create([
                'user_id' => Auth::id(),
                'content' => $validatedData['comment']
            ])->load('user')
        );

        $this->comment = '';
        $this->commentsCount++;
        $this->emit('new-comments');
    }

    public function changeSortType($sortType)
    {
        if($sortType != $this->sortType) {
            if(in_array($sortType, $this->sortTypes)) {
                $this->sortType = $sortType;
            }
        }
    }

    public function render()
    {
        return view('livewire.comments');
    }

    private function applySort(MorphMany $comments): MorphMany
    {
        if($this->sortType === 'newest') {
            $comments->orderBy('created_at');
        }

        if($this->sortType === 'best') {
            $comments->orderBy('content');
        }

        return $comments;
    }
}
