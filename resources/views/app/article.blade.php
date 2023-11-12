@extends('app.layouts.main')

@section('content')
<article>

    <header id="article-header">
        <div class="parallax">
            <div class="parallax-init">
                <img alt="{{ $article->name }}" src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
            </div>
        </div>
        <div class="article-header-content">

            <div class="content-overlay">
                <x-breadcrumb small/>
            </div>

            <div class="content-overlay">
                <div class="article-tags">
                    <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                    <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                </div>
                <h1> {{ $article->name }} </h1>
                <div class="article-meta">
                    <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                    <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> {{ $article->author->name }} </a>
                    <span class="article-date"> {{ $article->published_at->diffForHumans() }} </span>
                </div>
            </div>
        </div>
    </header>


    <div class="content-overlay">

        <main id="main">
            <div class="article-content">
                @foreach ($article->sections as $section)
                    <div class="article-section">
                        <h3> {{ $section->title }} </h3>
                        {!! $section->content !!}
                    </div>
                @endforeach
            </div>

            @livewire("reaction", ["reactionable" => $article], key("reactionable-" . $article::class . "-" . $article->id))
            @livewire("comments", ["commentable" => $article], key("commentable-" . $article::class . "-" . $article->id))

        </main>

        <aside id="sidebar">

        </aside>
    </div>

</article>
@endsection
