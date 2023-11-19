<?php

namespace App\Livewire;

use Livewire\Component;
use App\Interfaces\Commentable;
use Illuminate\Pagination\Cursor;

class SubCommentsLoad extends Component
{
    public Commentable $commentable;
    public bool $loadMore = false;
    public int $perPage;
    public ?string $cursor = null;

    public function loadMoreData()
    {
        $this->loadMore = true;
        $this->emit('new-comments');
    }

    public function render()
    {
        return view('livewire.sub-comments-load', [
            'comments' => $comments = $this->commentable->comments()->with('user')->orderBy('created_at', 'desc')->cursorPaginate($this->perPage, ['*'], 'cursor', Cursor::fromEncoded($this->cursor))
        ]);
    }
}
