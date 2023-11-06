@if(!$small)
    <header id="breadcrumb-header">
@endif

<aside id="breadcrumb">
    @foreach ($navigation as $link)
        <a title="Przejdź do {{ $link['name'] }}."
            @if($loop->last) class="active" @else href="{{ $link['url'] }}" @endif
        >
            {{ $link['name'] }}
        </a>
    @endforeach
</aside>

@if(!$small)

    <h1> {{ end($navigation)['name'] }} </h1>

    @if(isset($description))
        <p> {{ $description }} </p>
    @endif

    </header>
@endif