<div class="comments-content">
    <div wire:loading>
        <img
            src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExcTRscGU4dXlib3J6YndpcHI0ZnE0Z2UxNXY2M2I3OHRmazNsc2Z1NiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3oEjI6SIIHBdRxXI40/giphy.gif"
            alt="Trwa ładowanie..."
        >
    </div>
    @if($loadMore)
        <div class="comments-content">
            @foreach ($comments as $comment)
                <div class="comment intialize">
                    <div class="comment-author">
                        <img src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <h3 class="comment-author-name">{{ $comment->user->name }}</h3>
                        <p class="comment-time">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="comment-body">
                        <input type="checkbox" id="show-more-{{ $comment->id }}" hidden>
                        <div class="comment-content">
                            <p> {{ $comment->content }} </p>
                        </div>
                        <label for="show-more-{{ $comment->id }}" class="show-more"></label>
                        <div class="comment-social">
                            @livewire('reaction', ['reactionable' => $comment, 'small' => true], key("reactionable-" . $comment::class . "-" . $comment->id))
                        </div>
                    </div>
                </div>
            @endforeach

            @if($comments->hasMorePages())
                @livewire('sub-comments-load', ['commentable' => $commentable, 'perPage' => $perPage, 'cursor' => $comments->nextCursor()->encode()], key("commentable-" . "-" . $commentable::class . "-" . $commentable->id . "-" . time()))
            @endif
        </div>
    @else
    <div
        wire:click="loadMoreData"
        wire:loading.remove
        @if($cursor == null) x-data x-intersect="@this.call('loadMoreData')" @endif
    >
        <button class="clickable loadable ">Pokaż więcej</button>
    </div>
    @endif
</div>
