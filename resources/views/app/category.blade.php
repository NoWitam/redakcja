@extends('app.layouts.main')

@section('content')

    <x-breadcrumb />



    <div class="content-center">
        <div class="articles-list">

            @if(isset($subCategories) AND count($subCategories))
                <div id="subcategories" class="article-trailer">
                    @foreach ($subCategories as $subCategory)
                        <a href="{{ route('subcategory', ['category' => $category['slug'], 'subcategory' => $subCategory['slug']]) }}">
                            {{ $subCategory['name'] }} ({{ $subCategory['articles_count'] }})
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

            <div class="article-trailer">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                    <div class="article-popover">
                        <img class="article-author-img" src="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">
                        <a class="article-author-name" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg">Hubert Golewski</a>
                        <span class="article-date">28 kwietnia 2023</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
