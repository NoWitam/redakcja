<?php

namespace App\Livewire;

use Livewire\Component;
use App\Interfaces\Commentable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Pagination\Cursor;

class CommentsLoad extends Component
{
    public Commentable $commentable;
    public string $sortType;
    public bool $loadMore = false;
    public int $perPage;
    public ?string $cursor = null;
    public $newCommentIds;

    public function loadMoreData()
    {
        $this->loadMore = true;
        $this->emit('new-comments');
    }

    public function render()
    {
        if($this->loadMore) {
            return view('livewire.comments-load', [
                'comments' => $this->getComments()
            ]);
        } else {
            return view('loading', [
                'intersect' => true
            ]);
        }

    }

    private function getComments()
    {
        $comments = $this->commentable->comments()->with('user')->withCount('comments')->whereNotIn('id', $this->newCommentIds);
        $comments = $this->applySort($comments)->cursorPaginate($this->perPage, ['*'], 'cursor', Cursor::fromEncoded($this->cursor));

        return $comments;
    }

    private function applySort(MorphMany $comments): MorphMany
    {
        if($this->sortType === 'newest') {
            $comments->orderBy('created_at', 'desc');
        }

        if($this->sortType === 'best') {
            $comments->orderBy('content');
        }

        return $comments;
    }

}
