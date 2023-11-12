<section role="comments" id="comments">
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
    <div class="comments-form">
        <input type="text" placeholder="Dodaj komentarz">
        <button>Skomentuj</button>
    </div>
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
                    <livewire:reaction :reactionable="$comment" small :key="$comment->id" />
                </div>
            </div>
        @endforeach

        @if($hasMorePages)
            <div x-intersect="$wire.loadComments()">
                <img src="https://i.gifer.com/ZKZg.gif" alt="Trwa ładowanie...">
            </div>
        @endif
    </div>

</section>
