<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title', 'Redakcja') </title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        @livewireStyles
    </head>

    <body>
        <header id="site-header">
            <a href="{{ route('articles') }}">
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

        <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        @stack('scripts')

        @livewireScripts
    </body>

</html>
