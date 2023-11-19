<section role="comments" class="comments small">
    @auth
        <div class="comments-form">
            <input wire:model.defer="comment" type="text" role="addSubComment" placeholder="Dodaj komentarz">
            <button class="clickable" role="hideSubComment">Anuluj</button>
            <button wire:click="create" class="clickable">Skomentuj</button>
        </div>
    @endauth

    @if($commentsCount)
        <button role="loadMore" class="clickable loadable @if($addedNew) active @endif "> {{ $commentsCount }} odpowiedzi</button>
        @livewire('sub-comments-load', ['commentable' => $commentable, 'perPage' => $perPage, 'cursor' => null], key("commentable-" . "-" . $commentable::class . "-" . $commentable->id . "-" . time()))
    @endif
</section>
