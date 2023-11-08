@unless ($breadcrumbs->isEmpty())
    @if(!$small)
        <header id="breadcrumb-header">
    @endif

    <aside id="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <a title="Przejdź do {{ $breadcrumb->title }}."
                @if($loop->last) class="active" @else href="{{ $breadcrumb->url }}" @endif
            >
                {{ $breadcrumb->title }}
            </a>
        @endforeach
    </aside>

    @if(!$small)

        <h1> {{ $breadcrumbs->last()->title }} </h1>

        @if(isset($breadcrumbs->last()->description))
            <p> {{ $breadcrumbs->last()->description }} </p>
        @endif

        </header>
    @endif
@endunless


