<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: lien ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <title>{{ config('app.name', 'Filmkpamin') }} Découvrez - Votre Source de Divertissement Béninois en Streaming
    </title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}" sizes="125x125">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('build/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('build/css/frontend.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('build/css/frontend.css')}}">
    <link href="https://unpkg.com/ionicons@4.3.0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://unpkg.com/typewriter-effect@2.18.2/dist/core.js"></script>
    <script async src="https://static.linguise.com/script-js/switcher.bundle.js?d=pk_Gk8kfor20mlALgaT0HgN5Ay5vuvzCPTM"></script>
    {{-- librarie aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @yield('styles')
    <style>
        
    </style>
</head>

<body class="body" >
    @include('frontend.partials._header')
    <div id="app" >
        @yield('content')
    </div>
    @include('frontend.partials._footer')

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
    <script src="{{ mix('build/js/frontend.js') }}"></script>
    <script src="https://kit.fontawesome.com/3a537738e0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/6IIF9qE3z7bz19c6fi5F5G/JinVvqkhlXGgKpK" crossorigin="anonymous">
    </script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // carousel
        document.addEventListener('DOMContentLoaded', function() {
            function initializeCarousel(carouselId) {
                const carousel = document.getElementById(carouselId);
                const holder = carousel.querySelector(`#${carouselId}-holder`);
                const items = Array.from(holder.querySelectorAll('.card'));
                const itemWidth = items[0].offsetWidth + 16; // Largeur d'un élément + marge droite
                const totalItems = items.length;

                // Calculer la largeur totale du conteneur
                const totalWidth = (totalItems * 2 * itemWidth) + 'px';
                holder.style.width = totalWidth;

                let currentIndex = 0;

                function updateCarousel(direction) {
                    currentIndex += direction;

                    if (currentIndex >= totalItems) {
                        currentIndex = 0;
                        holder.style.transition = 'none';
                        holder.style.transform = `translateX(0px)`;
                        setTimeout(() => {
                            holder.style.transition = 'transform 0.5s ease';
                        }, 20);
                    } else if (currentIndex < 0) {
                        currentIndex = totalItems - 1;
                        holder.style.transition = 'none';
                        const resetOffset = -(currentIndex * itemWidth);
                        holder.style.transform = `translateX(${resetOffset}px)`;
                        setTimeout(() => {
                            holder.style.transition = 'transform 0.5s ease';
                        }, 20);
                    } else {
                        const offset = -(currentIndex * itemWidth);
                        holder.style.transform = `translateX(${offset}px)`;
                    }
                }

                // Fonctions pour les boutons
                window.prevSlide = function(carouselId) {
                    const carousel = document.getElementById(carouselId);
                    const holder = carousel.querySelector(`#${carouselId}-holder`);
                    const itemWidth = holder.querySelector('.card').offsetWidth + 16;
                    currentIndex -= 1;
                    if (currentIndex < 0) {
                        currentIndex = totalItems - 1;
                        holder.style.transition = 'none';
                        const resetOffset = -(currentIndex * itemWidth);
                        holder.style.transform = `translateX(${resetOffset}px)`;
                        setTimeout(() => {
                            holder.style.transition = 'transform 0.5s ease';
                        }, 20);
                    } else {
                        const offset = -(currentIndex * itemWidth);
                        holder.style.transform = `translateX(${offset}px)`;
                    }
                };

                window.nextSlide = function(carouselId) {
                    const carousel = document.getElementById(carouselId);
                    const holder = carousel.querySelector(`#${carouselId}-holder`);
                    const itemWidth = holder.querySelector('.card').offsetWidth + 16;
                    currentIndex += 1;
                    if (currentIndex >= totalItems) {
                        currentIndex = 0;
                        holder.style.transition = 'none';
                        holder.style.transform = `translateX(0px)`;
                        setTimeout(() => {
                            holder.style.transition = 'transform 0.5s ease';
                        }, 20);
                    } else {
                        const offset = -(currentIndex * itemWidth);
                        holder.style.transform = `translateX(${offset}px)`;
                    }
                };

                // Initialiser le carousel
                updateCarousel(0);
            }

            // Initialiser tous les carousels sur la page
            initializeCarousel('carousel0');
            initializeCarousel('carousel1');
            initializeCarousel('carousel2');
            initializeCarousel('carousel3');
            initializeCarousel('carousel4');
            initializeCarousel('carousel5');
            initializeCarousel('carousel6');
            initializeCarousel('carousel7');
            initializeCarousel('carousel8');
            initializeCarousel('carousel9');
        });


        // animation home
        var options = {
            strings: [
                "Plongez dans un monde de divertissement illimité avec des films et séries Béninois pour tous les goûts. Découvrez les nouveautés chaque semaine en un seul endroit !"
            ],
            typeSpeed: 60, // Vitesse de frappe en millisecondes
            backSpeed: 50, // Vitesse de suppression en millisecondes
            backDelay: 8000, // Délai avant de commencer à effacer
            startDelay: 1000, // Délai avant de commencer la frappe
            showCursor: true, //  cursor
            cursorChar: "|",
            loop: true // Boucle infinie
        };

        var typed = new Typed("#typed-output", options);


        // Video playing
        document.querySelectorAll('.card__cover').forEach(function(card) {
            card.addEventListener('mouseover', function() {
               let video = card.querySelector('.card__video');
                if (video) {
                    video.play();
                }
            });

            card.addEventListener('mouseout', function() {
                let video = card.querySelector('.card__video');
                if (video) {
                    video.pause();
                    video.currentTime = 0; // Revenir au début de la vidéo
                }
            });
        });

        // preloder
        document.addEventListener("DOMContentLoaded", function() {
            // Assurer que le contenu n'est pas visible avant la fin du chargement
            window.onload = function() {
                // montrer le contenu une fois la page est complètement chargée
                document.getElementById("preloader").style.display = "none";
            };
        });
    </script>
    <script src="{{ asset('js/notifications.js') }}"></script>
</body>

</html>
