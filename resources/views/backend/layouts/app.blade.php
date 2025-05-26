<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Search Engine -->
    <meta name="description"
        content="Bienvenue sur Filmkpamin, la première plateforme de divertissement en streaming au Bénin, conçue par Drwintech. Profitez d'un large éventail de films, séries et documentaires, spécialement sélectionnés pour vous offrir une expérience de visionnage incomparable. Que vous soyez à la recherche des dernières nouveautés ou de classiques intemporels, Filmkpamin a quelque chose pour chaque amateur de divertissement. Rejoignez notre communauté et explorez une multitude de contenus disponibles en haute définition, à tout moment et n'importe où. Découvrez la magie de Filmkpamin aujourd'hui !">
    <meta name="image" content="">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Amusez-vous | Site de streaming en ligne n°1 au Bénin">
    <meta itemprop="description"
        content="Bienvenue sur Filmkpamin, la première plateforme de divertissement en streaming au Bénin, conçue par Drwintech. Profitez d'un large éventail de films, séries et documentaires, spécialement sélectionnés pour vous offrir une expérience de visionnage incomparable. Que vous soyez à la recherche des dernières nouveautés ou de classiques intemporels, Filmkpamin a quelque chose pour chaque amateur de divertissement. Rejoignez notre communauté et explorez une multitude de contenus disponibles en haute définition, à tout moment et n'importe où. Découvrez la magie de Filmkpamin aujourd'hui !">
    <meta itemprop="image" content="">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta property="og:title" content="Film Bénin">
    <meta property="og:title" content="Vidéo Béninois">
    <meta property="og:description"
        content="Bienvenue sur Filmkpamin, la première plateforme de divertissement en streaming au Bénin, conçue par Drwintech. Profitez d'un large éventail de films, séries et documentaires, spécialement sélectionnés pour vous offrir une expérience de visionnage incomparable. Que vous soyez à la recherche des dernières nouveautés ou de classiques intemporels, Filmkpamin a quelque chose pour chaque amateur de divertissement. Rejoignez notre communauté et explorez une multitude de contenus disponibles en haute définition, à tout moment et n'importe où. Découvrez la magie de Filmkpamin aujourd'hui !">
    <meta property="og:image" content="">
    <meta property="og:locale" content="fr,en">
    <meta property="og:type" content="site web">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}" sizes="125x125">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('build/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('build/css/admin.css') }}" rel="stylesheet">
    <link href="{{ mix('build/css/frontend.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.3.0/dist/css/ionicons.min.css" rel="stylesheet">
    @yield('styles')
    @stack('styles')
</head>

<body>
    @includeWhen(Auth::check(), 'backend.partials._sidebar')
    <div id="app">
        @auth
            <main class="main">
            @endauth
            @yield('content')
            @auth
            </main>
        @endauth

        @yield('modal')
    </div>
    {{-- Preloader --}}
    <div id="preloader">
        <div class="spinner">
            <div class="filmstrip"></div>
            <div class="filmstrip"></div>
            <div class="filmstrip"></div>
            <div class="circle"></div>
        </div>
        <p>Chargement...</p>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('build/js/app.js') }}"></script>
    @stack('javascripts')
    <script src="{{ mix('build/js/admin.js') }}" defer></script>
    <script>
        // preloder
        document.addEventListener("DOMContentLoaded", function() {
            // Assurer que le contenu n'est pas visible avant la fin du chargement
            window.onload = function() {
                // montrer le contenu une fois la page est complètement chargée
                document.getElementById("preloader").style.display = "none";
            };
        });
    </script>
</body>

</html>
