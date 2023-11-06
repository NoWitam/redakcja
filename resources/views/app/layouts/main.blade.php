<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title', 'Redakcja') </title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        
    </head>

    <body>
        <header id="site-header">
            <h1 class="logo">Redakcja</h1>
            <nav>

                <div class="icon-hover">
                    <span class="icon-title">Kategorie</span>
                    <span class="icon">
                        <img src={{ asset('icons/category.png') }}>
                    </span>
                </div>

                <div class="icon-hover">
                    <span class="icon-title">Na czasie</span>
                    <span class="icon">
                        <img src={{ asset('icons/trend.png') }}>
                    </span>
                </div>

                <div class="icon-hover">
                    <span class="icon-title">Szybkie newsy</span>
                    <span class="icon">
                        <img src={{ asset('icons/news.png') }}>
                    </span>
                </div>

                <div class="icon-hover">
                    <span class="icon-title">Szukaj</span>
                    <span class="icon">
                        <img src={{ asset('icons/search.png') }}>
                    </span>
                </div>

            </nav>
            <img class="profile" src={{ asset('icons/profile.png') }}>
        </header>

        <div id="content">
                @yield('content')
        </div>


        @stack('scripts')
    </body>

</html>
