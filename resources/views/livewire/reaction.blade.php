<aside id="reaction">

    <div class="reaction-title">
        <h3>Podziel się swoją reakcją</h3>
    </div>

    <div class="reaction-content">
            @foreach ($reactions as $type => $reaction)
                <div class="reaction-item" wire:click="react({{ $type }})">
                    <div class="reaction-item-content">
                        <div class="reaction-item-icon">
                            <img src="{{ asset('icons/'.$reaction['svg']) }}" alt="Twoja reakcja to - {{ $reaction['label'] }}">
                        </div>
                        <span class="reaction-item-title">
                            {{ $reaction['label'] }}
                        </span>
                    </div>
                    <span class="reaction-item-count @if($reaction['active']) active @endif">
                        {{ $reaction['count'] }}
                    </span>
                </div>
            @endforeach
    </div>

</aside>
