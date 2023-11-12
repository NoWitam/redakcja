<?php

namespace App\Livewire;

use App\Interfaces\Commentable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Illuminate\Pagination\Cursor;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    #[Locked]
    public Commentable $commentable;
    #[Locked]
    public string $sortType = "best";
    #[Locked]
    public array $sortTypes = [
        "best",
        "newest"
    ];
    public $commentsCount;
    public $comments;

    public $nextCursor;

    public $hasMorePages;

    public function mount()
    {
        $this->commentsCount = $this->commentable->comments()->count();

        $this->comments = new Collection();

        $this->loadComments();
    }


    public function loadComments()
    {
        if ($this->hasMorePages !== null  && ! $this->hasMorePages) {
            return;
        }

        $comments = $this->getComments();

        $this->comments->push(...$comments->items());

        if ($this->hasMorePages = $comments->hasMorePages()) {
            $this->nextCursor = $comments->nextCursor()->encode();
        }
        //$this->js("intializeShowMore()");
    }

    public function changeSortType($sortType)
    {
        if($sortType != $this->sortType) {
            if(in_array($sortType, $this->sortTypes)) {
                $this->sortType = $sortType;
                $this->nextCursor = null;
                $this->commentsHTML = view('livewire.parts.comments', ['comments' => $this->getComments()])->render();
                return;
            }
        }

        $this->skipRender();
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
        //dump($this->sortType);
        return $comments;
    }

    public function getComments()
    {
        $comments = $this->commentable->comments()->with('user');
        $comments = $this->applySort($comments)->cursorPaginate(12, ['*'], 'cursor', Cursor::fromEncoded($this->nextCursor));

        return $comments;
    }

}
