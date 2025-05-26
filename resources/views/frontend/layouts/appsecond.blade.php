<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Découvrez - Votre Source de Divertissement Béninois en Streaming !
    </title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}" sizes="125x125">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('build/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('build/css/frontend.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.3.0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
    <style>

    </style>
</head>

<body class="body">
    <div id="app">
        @yield('content')
    </div>
    @includeWhen(request()->routeIs('home'), 'frontend.partials._footer')
    <!-- Scripts -->
    <script src="{{ mix('build/js/app.js') }}"></script>
    @stack('javascripts')
    <script src="{{ mix('build/js/frontend.js') }}"></script>
    <script>
        @if (session('message'))
            $.notify("{{ session('message') }}");
        @endif
    </script>
    <script src="https://kit.fontawesome.com/3a537738e0.js" crossorigin="anonymous"></script>
</body>

</html>
