@extends('app.layouts.main')

@section('content')

    @if(true)
        <div class="content-overlay">
            <div class="podium">
        
                <div class="podium-item article-trailer">
                    <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                    <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                    <div class="article-details">
                        <div class="article-tags">
                            <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                            <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                        </div>
                        <h1>Czytaj książki</h1>
                    </div>
                </div>
            
                <div class="podium-right">
        
                    <div class="podium-item article-trailer">
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
        
                    <div class="podium-item article-trailer">
                        <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                        <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                        <div class="article-details">
                            <div class="article-tags">
                                <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                                <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                            </div>
                            <h1>Czytaj książki</h1>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>


        <div class="tunnel">
            <div class="tunnel-item">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"></a>
                <img class="icon" src={{ asset('icons/trend-medium.png') }}>
                <span class="tunnel-tittle text-center">Lista na czasie</span>
            </div>

        
            <div class="tunnel-item article-trailer article-trailer-has-hover">
                <a class="article-link" href="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg"></a>
                <img src="https://flarrow.pl/wp-content/uploads/2023/04/IMG_6659-1110x750.jpeg">
                <div class="article-details article-no-hover">
                    <div class="article-tags">
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Inne </a>
                        <a class="article-tag" href="https://flarrow.pl/wp-content/uploads/2023/03/IMG_6224-370x250.jpeg"> Książki </a>
                    </div>
                    <h1>Czytaj książki</h1>
                </div>
                <span class="article-hover">Nr. 1 na czase w kategorii Dom</span>
            </div>
    
            <div class="tunnel-item"></div>
            <div class="tunnel-item"></div>
        </div>
    @endif

    <div class="content-center">
        <div class="articles-list">

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

    <nav class="pagination">
        <a class="pagination-number pagination-prev"></a>
        <a class="pagination-number">1</a>
        <span class="pagination-dots"></span>
        <a class="pagination-number">3</a>
        <a class="pagination-number pagination-current">4</a>
        <a class="pagination-number">5</a>
        <span class="pagination-dots"></span>
        <a class="pagination-number">22</a>
        <a class="pagination-number pagination-next"></a>
    </nav>

@endsection