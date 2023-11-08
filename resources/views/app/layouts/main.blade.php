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
            <a href="{{ route('home') }}">
                <h1 class="logo">Redakcja</h1>
            </a>

            <nav>

                <a class="icon-hover" href={{ route('categories') }}>
                    <span class="icon-title">Kategorie</span>
                    <span class="icon">
                        <img src={{ asset('icons/category.png') }}>
                    </span>
                </a>

                <a class="icon-hover">
                    <span class="icon-title">Na czasie</span>
                    <span class="icon">
                        <img src={{ asset('icons/trend.png') }}>
                    </span>
                </a>

                <a class="icon-hover">
                    <span class="icon-title">Szybkie newsy</span>
                    <span class="icon">
                        <img src={{ asset('icons/news.png') }}>
                    </span>
                </a>

                <a class="icon-hover">
                    <span class="icon-title">Szukaj</span>
                    <span class="icon">
                        <img src={{ asset('icons/search.png') }}>
                    </span>
                </a>

            </nav>
            <img class="profile" src={{ asset('icons/profile.png') }}>
        </header>

        <div id="content">
                @yield('content')
        </div>


        @stack('scripts')
    </body>

</html>