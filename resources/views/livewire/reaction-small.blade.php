<aside>
    <div class="reaction-content small">
            @foreach ($reactions as $type => $reaction)
                <div class="reaction-item" wire:click="react({{ $type }})">
                    <div class="reaction-item-content">
                        <div class="reaction-item-icon">
                            <img src="{{ asset('icons/'.$reaction['svg']) }}" alt="Twoja reakcja to - {{ $reaction['label'] }}">
                        </div>
                    </div>
                    <span class="reaction-item-count @if($reaction['active']) active @endif">
                        {{ $reaction['count'] }}
                    </span>
                </div>
            @endforeach
    </div>
</aside>
