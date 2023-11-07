@extends('app.layouts.main')

@section('content')

    <x-breadcrumb />

    <div class="content-center">
        <div class="articles-list">

            @foreach ($categories as $category)
                <div class="category-item article-trailer article-trailer-has-hover">
                    <a class="category-link" href="{{ route('category', ['category' => $category['slug']]) }}"></a>
                    <div class="category-details">
                        <h1> {{ $category['name'] }} ({{ $category['articles_count'] }})</h1>
                    </div>
                    <span class="category-hover">{{ $category['description'] }}</span>
                </div>
            @endforeach

        </div>
    </div>

@endsection
