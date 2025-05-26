<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Search Engine -->
    <meta name="description" content=" is an open source streaming entertainment service created with Laravel.">
    <meta name="image" content="https://i.ibb.co/GnwbP81/.jpg">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content=" | No. 1 Online Streaming Site in Bangladesh">
    <meta itemprop="description" content=" is an open source streaming entertainment service created with Laravel.">
    <meta itemprop="image" content="https://i.ibb.co/GnwbP81/.jpg">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content=" | No. 1 Online Streaming Site in Bangladesh">
    <meta name="og:description" content=" is an open source streaming entertainment service created with Laravel.">
    <meta name="og:image" content="https://i.ibb.co/GnwbP81/.jpg">
    <meta name="og:locale" content="en_US, bn_BD">
    <meta name="og:type" content="website">

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
    @include('backend.partials._header')
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
    <!-- Scripts -->
    <script src="{{ mix('build/js/app.js') }}"></script>
    @stack('javascripts')
    <script src="{{ mix('build/js/admin.js') }}" defer></script>
</body>

</html>
