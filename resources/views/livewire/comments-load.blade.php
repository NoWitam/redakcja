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
                    <button role="addSubComment" class="clickable">Odpowiedz</button>
                </div>
                @livewire("sub-comments", ["commentable" => $comment, "perPage" => 6, "commentsCount" => $comment->comments_count], key("comments-" . "-" . $comment::class . "-" . $comment->id))
            </div>
        </div>
    @endforeach

    @if($comments->hasMorePages())
        @livewire('comments-load', ['newCommentIds' => $newCommentIds, 'sortType' => $sortType, 'commentable' => $commentable, 'perPage' => $perPage, 'cursor' => $comments->nextCursor()->encode()], key("commentable-" . $sortType . "-" . $commentable::class . "-" . $commentable->id))
    @endif
</div>

