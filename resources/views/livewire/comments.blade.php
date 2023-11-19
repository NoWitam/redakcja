<section role="comments" class="comments">
    <div class="comments-header">
        <span class="comments-count">
            {{ $commentsCount }} komentarzy
        </span>
        <div class="comments-sort">
            <span
                @if($sortType === 'best') class="active" @endif
                wire:click="changeSortType('best')"
            >
                Najlepsze komentarze
            </span>
            <span class="line"></span>
            <span
                @if($sortType === 'newest') class="active" @endif
                wire:click="changeSortType('newest')"
            >
                Od najnowszych
            </span>
        </div>
    </div>
    @auth
        <div class="comments-form">
            <input wire:model.defer="comment" type="text" placeholder="Dodaj komentarz">
            <button wire:click="create" class="clickable">Skomentuj</button>
        </div>
    @endauth
    <div class="comments-content">
        @foreach ($newComments as $comment)
            <div class="comment intialize">
                <div class="comment-author">
                    <img src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                    <h3 class="comment-author-name">{{ $comment['user']['name'] }}</h3>
                    <p class="comment-time">{{ Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</p>
                </div>
                <div class="comment-body">
                    <input type="checkbox" id="show-more-{{ $comment['id'] }}" hidden>
                    <div class="comment-content">
                        <p> {{ $comment['content'] }} </p>
                    </div>
                    <label for="show-more-{{ $comment['id'] }}" class="show-more"></label>
                    @livewire('reaction', ['reactionable' => $comment, 'small' => true], key("reactionable-" . "App\Models\Comment" . "-" . $comment['id']))
                </div>
            </div>
        @endforeach
    </div>

    @livewire('comments-load', ['newCommentIds' => $newComments->pluck('id'), 'sortType' => $sortType, 'commentable' => $commentable, 'perPage' => $perPage, 'cursor' => null], key("commentable-" . "-" . $sortType . "-" . $commentable::class . "-" . $commentable->id . "-" . time()))

</section>
