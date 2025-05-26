@extends('frontend.layouts.app')

@section('content')
    <!-- home -->
    <!-- Section bannière -->
    <section class="banner  w-100">
        <div class="col titltemovies">
            <h1 class="home__title mb-0 " style="color: white; ">Les films les mieux notés</h1>

            <button class="home__nav home__nav--prev" type="button">
                <i class="icon ion-ios-arrow-round-back  arrow-left" style="color: white;"></i>
            </button>
            <button class="home__nav home__nav--next" type="button">
                <i class="icon ion-ios-arrow-round-forward  arrow-right" style="color: white;"></i>
            </button>
        </div>
    </section>
    <!-- carousel -->
    <div class="container " style="margin-top:80px ">
        <div class="row">
            <!-- carousel -->
            <div id="album-rotator">
                <div id="album-rotator-holder">
                    @if ($films->isEmpty())
                        <p class="text-left">Aucune meilleur film pour l'instant</p>
                    @else
                        @foreach ($films as $films)
                            <div class="card mx-4">
                                <div class="card__cover card_film">
                                    <img src="{{ asset('storage/' . $films->photos) }}" alt="{{ $films->title }}" />
                                    <!-- Vidéo qui sera affichée au survol -->
                                    <video class="card__video" muted preload="metadata">
                                        <source src="{{ asset('storage/' . $films->demo) }}" type="video/mp4">
                                    </video>
                                    <a href="{{ route('frontend.videos.show', $films->slug) }}" class="card__play">
                                        <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span style="color: #3d3ddb">
                                                <i
                                                    class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($films->runtime) }}
                                            </span>
                                        </div>
                                        <div>
                                            @if ($films->views == 0)
                                            @else
                                                <span class="" style="color: #3d3ddb; font-weight: 600;">
                                                    {{ formatNumber($films->views) }}
                                                    <i class="fa-regular fa-eye mx-1"></i> vues
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="card__title">
                                        <a href="{{ route('frontend.videos.show', $films->slug) }}"
                                            style="color: #fff;">{{ $films->title }}</a>
                                    </p>
                                    <span class="card__category" style="">
                                        {{ $films->type }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- end carousel -->
        </div>
    </div>
    {{-- Les films  --}}
    <!-- section action -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Actions
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel10')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel10')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel10" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel10-holder" class="carousel10-holder">
                        @php
                            $genreRecherche = 'action'; // ou 'Action'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films d'action disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}" class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section action -->
    <!-- section aventure -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Aventures
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel11')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel11')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel11" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel11-holder" class="carousel11-holder">
                        @php
                            $genreRecherche = 'aventure'; // ou 'Action'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films d'aventure disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section aventure -->

    <!-- section science fiction -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Science fiction
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel12')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel12')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel12" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel12-holder" class="carousel12-holder">
                        @php
                            $genreRecherche = 'fiction'; // ou 'fiction'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films de science fiction disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section science_fiction -->
    <!-- section Mystère -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Mystères
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel13')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel13')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel13" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel13-holder" class="carousel13-holder">
                        @php
                            $genreRecherche = 'mystere'; // ou 'mystere'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films mystere disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section Mystère -->
    <!-- section drame -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Drames
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel14')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel14')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel14" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel14-holder" class="carousel14-holder">
                        @php
                            $genreRecherche = 'drame'; // ou 'Action'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films drame disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section drame -->
    <!-- section comedie -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Comédies
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel15')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel15')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel15" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel15-holder" class="carousel15-holder">
                        @php
                            $genreRecherche = 'comedie'; // ou 'Action'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films comédie disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section comédie -->

    <!-- section horreur -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Horreurs
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel16')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel16')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel16" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel16-holder" class="carousel16-holder">
                        @php
                            $genreRecherche = 'horreur'; // ou 'horreur'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films d'horreur disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section horreur -->
    <!-- section romance -->
    <section class="section mb-4 section--bg p-0 mt-3">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12 toseaching pt-2" data-aos="fade-up" data-aos-duration="2000">
                    <div class="section__title-wrap">
                        <p class="section__title section__title--carousel title align-self-center">
                            Romances
                        </p>
                        <div class="section__nav-wrap">
                            <button class="section__nav section__nav--prev arrow-left" type="button"
                                onclick="prevSlide('carousel17')">
                                <i class="icon ion-ios-arrow-back"></i>
                            </button>
                            <button class="section__nav section__nav--next arrow-right" type="button"
                                onclick="nextSlide('carousel17')">
                                <i class="icon ion-ios-arrow-forward"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end section title -->

                <!-- carousel -->
                <div id="carousel17" class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
                    <div id="carousel17-holder" class="carousel17-holder">
                        @php
                            $genreRecherche = 'romance'; // ou 'romance'
                            $filmsParGenre = $Toutfilms->filter(function ($film) use ($genreRecherche) {
                                // On décode le champ JSON "genres"
                                $genres = json_decode($film->genres, true);
                                return is_array($genres) && in_array($genreRecherche, $genres);
                            });
                        @endphp
                        @if ($filmsParGenre->isEmpty())
                            <p class="text-left">Aucun films romance disponible pour l'instant</p>
                        @else
                            @foreach ($Toutfilms as $newfilms)
                                <div class="card mx-4">
                                    <div class="card__cover card_film">
                                        <img src="{{ asset('storage/' . $newfilms->photos) }}"
                                            alt="{{ $newfilms->title }}" />
                                        <!-- Vidéo qui sera affichée au survol -->
                                        <video class="card__video" muted preload="metadata">
                                            <source src="{{ asset('storage/' . $newfilms->demo) }}" type="video/mp4">
                                        </video>
                                        <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                            class="card__play">
                                            <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                        </a>
                                    </div>
                                    <div class="card__content">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span style="color: #3d3ddb">
                                                    <i
                                                        class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($newfilms->runtime) }}
                                                </span>
                                            </div>
                                            <div>
                                                @if ($newfilms->views != 0)
                                                    <span style="color: #3d3ddb; font-weight: 600;">
                                                        {{ formatNumber($newfilms->views) }}
                                                        <i class="fa-regular fa-eye mx-1"></i> vues
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="card__title">
                                            <a href="{{ route('frontend.videos.show', $newfilms->slug) }}"
                                                style="color: black;">{{ $newfilms->title }}</a>
                                        </p>
                                        <span class="card__category">{{ $newfilms->type }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- end carousel -->
            </div>
        </div>
    </section>
    <!-- end section romance -->
@endsection
<!-- end section -->
<script>
    // carousel
    document.addEventListener('DOMContentLoaded', function() {
        const rotatorHolder = document.getElementById('album-rotator-holder');
        const arrowLeft = document.querySelector('.arrow-left');
        const arrowRight = document.querySelector('.arrow-right');

        const items = document.querySelectorAll('.card');
        const itemsPerPage = 3;
        const itemWidth = 190;
        const gap = 16;

        // Dupliquer les éléments pour l'effet infini
        const itemsArray = Array.from(items);
        itemsArray.forEach(item => {
            const clone = item.cloneNode(true);
            rotatorHolder.appendChild(clone);
        });

        // Calculer la largeur totale du conteneur
        const totalWidth = (itemsArray.length * (itemWidth + gap * 2)) + 'px';
        rotatorHolder.style.width = totalWidth;

        let currentIndex = 0;
        const maxIndex = itemsArray.length;

        const updateCarousel = (direction) => {
            currentIndex += direction;

            if (currentIndex >= maxIndex) {
                currentIndex = 0;
                rotatorHolder.style.transition = 'none';
                rotatorHolder.style.transform = `translateX(0px)`;
                setTimeout(() => {
                    rotatorHolder.style.transition = 'transform 0.5s ease';
                }, 20); // Petite pause pour que la transition soit appliquée
            } else if (currentIndex < 0) {
                currentIndex = maxIndex - 1;
                rotatorHolder.style.transition = 'none';
                const resetOffset = -(currentIndex * (itemWidth + gap * 2));
                rotatorHolder.style.transform = `translateX(${resetOffset}px)`;
                setTimeout(() => {
                    rotatorHolder.style.transition = 'transform 0.5s ease';
                }, 20); // Petite pause pour que la transition soit appliquée
            } else {
                const offset = -(currentIndex * (itemWidth + gap * 2));
                rotatorHolder.style.transform = `translateX(${offset}px)`;
            }
        };

        arrowLeft.addEventListener('click', () => {
            updateCarousel(-1);
        });

        arrowRight.addEventListener('click', () => {
            updateCarousel(1);
        });

        // Défilement automatique
        setInterval(() => {
            updateCarousel(1);
        }, 4000); // Change tous les 3 secondes

        // Initialisation du carousel
        updateCarousel(0);
    });

    // films carousel 
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
        initializeCarousel('carousel10');
        initializeCarousel('carousel11');
        initializeCarousel('carousel12');
        initializeCarousel('carousel3');
        initializeCarousel('carousel14');
        initializeCarousel('carousel15');
        initializeCarousel('carousel16');
        initializeCarousel('carousel17');
    });
</script>
