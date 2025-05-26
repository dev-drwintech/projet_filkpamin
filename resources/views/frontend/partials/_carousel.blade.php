@extends('frontend.layouts.app')
@section('content')
    <style>
        /* Conteneur principal */
        .film-container {
            display: flex;
            flex-direction: row;
            height: 70vh;
            overflow: hidden;
            margin: 80px auto !important;
            justify-content: center;
            gap: 20px;
        }

        .title-avenir {
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            text-align: left;
            margin: 20px auto;
            width: 85%;
        }

        *::-webkit-scrollbar {
            display: none;
        }

        /* Sidebar avec les vignettes */
        .film-sidebar {
            width: auto;
            background-color: #000;
            position: relative;
            overflow: hidden;
            height: 70vh;
        }

        /* Zone de contenu principal */
        .film-content {
            width: 70%;
            background-color: #000;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            position: relative;
        }

        /* Boutons de navigation */
        .film-nav-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            cursor: pointer;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            border: none;
        }

        .film-nav-up {
            top: 20px;
        }

        .film-nav-down {
            bottom: 20px;
        }

        /* Conteneur des vignettes */
        .film-thumbnails {
            display: flex;
            flex-direction: column;
            overflow-y: hidden;
            height: 100%;
            transition: transform 0.5s ease;
            width: 390px;
        }

        /* Style des vignettes */
        .film-thumbnail {
            position: relative;
            height: 200px;
            min-height: 200px;
            margin-bottom: 10px;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .film-thumbnail:hover {
            transform: scale(1.03);
        }

        .film-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.8);
        }

        .film-thumbnail.active {
            border: 2px solid #fd6716;
        }

        /* Info des films sur les vignettes */
        .film-info {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 10px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            width: 100%;
        }

        .film-info h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .film-info p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #ccc;
        }

        /* Contenu principal du film sélectionné */
        .film-featured {
            width: 100%;
            height: 70vh;
            position: relative;
        }

        .film-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
        }

        .film-details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            background: linear-gradient(transparent, #000);
            z-index: 2;
        }

        .film-details h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .film-meta {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .film-rating {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .film-rating .star {
            color: gold;
            margin-right: 5px;
        }

        .film-duration {
            color: #ccc;
        }

        .film-genres {
            display: flex;
            margin-bottom: 20px;
        }

        .film-genre {
            margin-right: 10px;
            color: #ccc;
            position: relative;
        }

        .film-genre:not(:last-child)::after {
            content: "•";
            position: absolute;
            right: -8px;
            color: #fd6716;
        }

        .film-description {
            max-width: 700px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #ccc;
        }

        .film-play-button {
            background-color: #fd6716;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            width: fit-content;
        }

        .film-play-button:hover {
            background-color: #fd6716;
            color: #fff;
        }

        .film-play-icon {
            margin-left: 10px;
        }

        /* Style responsive */
        @media (max-width: 992px) {
            .film-container {
                flex-direction: column;
                height: auto;
            }

            .film-sidebar {
                width: 100%;
                height: 200px;
            }

            .film-content {
                width: 100%;
                height: 500px;
            }

            .film-thumbnails {
                flex-direction: row;
                overflow-x: auto;
                overflow-y: hidden;
            }

            .film-thumbnail {
                width: 150px;
                min-width: 150px;
                height: 180px;
                margin-right: 10px;
                margin-bottom: 0;
            }

            .film-nav-button {
                transform: rotate(90deg);
            }

            .film-nav-up {
                top: 50%;
                left: 10px;
                transform: translateY(-50%) rotate(90deg);
            }

            .film-nav-down {
                top: 50%;
                left: auto;
                right: 10px;
                transform: translateY(-50%) rotate(90deg);
            }
        }
    </style>
    <!-- Alert infos -->
    <div class="alert-dismissible fade show animate__animated animate__fadeInRight" role="alert" id="alertNonconected">
        <div>
            Vous devez être connecté pour effectuer un paiement.
            <br>
            <a href="{{ route('login') }}" class=" offset-md-5 -text-center">Se connecter</a>
        </div>
    </div>

    <!-- message alerte -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInRight" role="alert"
            id="alertmessage">
            <div class="mx-2">
                {{ session('error') }}
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRight" role="alert"
            id="alertmessage">
            <div class="mx-2">
                {{ session('success') }}
            </div>
        </div>
    @endif


    <!-- home banner-->
    {{-- vérifier l'abonnement actif --}}
    @php
        $planactif = null;
    @endphp

    @if (!empty($payments))
        @foreach ($payments as $payment)
            @php
                $planactif = $payment->PlanAbonnement;
            @endphp
        @endforeach
    @else
    @endif
    <section class="hero" style="background-image:url('{{ asset('../img/home/bg.jpg') }}')">
        <div class="hero-content">
            <h1>Explorez la richesse du <br> cinéma béninois et bien plus, <br> en accès illimité.</h1>
            <p class="Descriptiones">À partir de 1000 FCFA, Annulez à tout moment.</p>
            <div class="buttons">
                <a id="" class="btnlearn mx-2" href="{{ route('about') }}">Apprendre encore plus</a>
                @if ($planactif == 'Basique')
                    <a id="" class="btnsubscrib mx-2" href="javascript:void(0)"
                        @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                        data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Devenez
                        Premium</a>
                @else
                    <a id="" class="btnsubscrib mx-2 payme " href="javascript:void(0)" plan="Basique"
                        data-amount="1000" @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                        data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Devenez Premium</a>
                @endif
            </div>
        </div>
    </section>
    <!-- end home banner  -->

    {{-- 
    <?php
    $videoNotee = null;
    
    foreach ($reviews['reviews'] as $review) {
        if ($review->rating >= 4.0) {
            foreach ($data['newVideos'] as $newVideo) {
                if ($newVideo->id == $review->video_id && $newVideo->status == 1) {
                    $videoNotee = $newVideo;
                    break 2;
                }
            }
        }
    }
    ?> --}}
    {{-- Section tendances --}}
    <div
        class="carousel-container @if ($videoNotee->isEmpty()) d-flex  flex-column justify-content-center align-items-center @endif tendances">
        <h2 class="mb-5 ">Tendances actuelles</h2>
        @if (!empty($videoNotee) && $videoNotee->isNotEmpty())
            <button class="carousel-button left">&lt;</button>
            <button class="carousel-button right">&gt;</button>
            <div class="carousel">
                @foreach ($videoNotee as $videotendance)
                    <div class="carousel-item ">
                        <img src="{{ asset('storage/' . $videotendance->photos) }}" alt="{{ $videotendance->title }}">
                        <a href="{{ route('frontend.videos.show', $videotendance->slug) }}"><i
                                class="fa-solid fa-play"></i></a>
                        <video class="video_playback" muted preload="metadata">
                            <source src="{{ asset('storage/' . $videotendance->demo) }}" type="video/mp4">
                        </video>
                        <div class="overlay animate__animated animate__bounceInUp ">
                            <h3>{{ $videotendance->title }}</h3>
                            <p>{{ $videotendance->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col d-flex justify-content-center align-items-center ">
                <div class="alert alert-info text-info" role="alert">
                    Aucune vidéo en tendances disponible pour le moment.
                </div>
            </div>
        @endif
    </div>
    {{-- Forfaits secion --}}
    <section class="forfaits">
        <div class="container">
            <div class="title mb-5">
                <p class=""><span class="">Découvrez nos plans tarifaires</span> <br> &nbsp; <span
                        class="mt-3">adaptés à vos envies !</span></p>
            </div>

            <div class="pricing-plans">
                <!-- Plan Basique -->
                <div class="plan">
                    <h2 class="basiquename">Basique</h2>
                    <p class="price">1000 FCFA / mois</p>
                    <ul class="features">
                        <li>Pas de publicité
                            <hr class="barreli">
                        </li>
                        <li>Accès à une bibliothèque complète
                            <hr class="barreli">
                        </li>
                        <li>Streaming en qualité HD
                            <hr class="barreli">
                        </li>
                        <li class="no-feature">Regardez sur 1 appareil à la fois
                            <hr class="barreli">
                        </li>
                        <li class="no-feature">Affichage hors ligne</li>
                    </ul>
                    @if ($planactif == 'Basique')
                        <a href="javascript:void(0)" class="cta disabled"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Abonnement actif</a>
                    @else
                        <a href="javascript:void(0)" class="cta payme" plan="Basique" data-amount="1000"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce plan</a>
                    @endif
                </div>

                <!-- Plan Standard -->
                <div class="plan d-none">
                    <h2 class="standardname">Standard</h2>
                    <p class="price">1500 FCFA / mois</p>
                    <ul class="features">
                        <li>Pas de publicité
                            <hr class="barreli">
                        </li>
                        <li>Accès à une bibliothèque complète
                            <hr class="barreli">
                        </li>
                        <li>Streaming en qualité Full HD
                            <hr class="barreli">
                        </li>
                        <li>Regardez sur n'importe quel appareil
                            <hr class="barreli">
                        </li>
                        <li>Diffusez sur 2 appareils à la fois
                            <hr class="barreli">
                        </li>
                        <li>Affichage hors ligne </li>
                    </ul>
                    @if ($planactif == 'Standard')
                        <a href="javascript:void(0)" class="cta disabled"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Abonnement actif</a>
                    @else
                        <a href="javascript:void(0)" class="cta payme" plan="Standard" data-amount="1500"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce plan</a>
                    @endif
                </div>

                <!-- Plan Premium -->
                <div class="plan d-none">
                    <h2 class="premiumname">Premium</h2>
                    <p class="price">5000 FCFA / mois</p>
                    <ul class="features">
                        <li>Pas de publicité
                            <hr class="barreli">
                        <li>Accès à une bibliothèque complète
                            <hr class="barreli">
                        <li>Streaming en qualité 4K
                            <hr class="barreli">
                        <li>Regardez sur n'importe quel appareil
                            <hr class="barreli">
                        <li>Diffusez sur 4 appareils à la fois
                            <hr class="barreli">
                        <li>Affichage hors ligne
                    </ul>
                    @if ($planactif == 'Premium')
                        <a href="javascript:void(0)" class="cta disabled"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Abonnement actif</a>
                    @else
                        <a href="javascript:void(0)" class="cta payme" plan="Premium" data-amount="5000"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce plan</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Avenir section --}}
    <section style="width: auto;">
        <p>

        </p>
        <h1 class="mb-5 title-avenir">À venir</h1>

        <div class="film-container">
            <!-- Navigation sidebar avec vignettes -->
            <div class="film-sidebar">
                <button class="film-nav-button film-nav-up">↑</button>

                <div class="film-thumbnails" id="filmThumbnails">
                    <!-- Vignette -->
                    @if ($comingVideos->isNotEmpty())
                        @foreach ($comingVideos as $video)
                            <div class="film-thumbnail" data-index="{{ $loop->index }}">
                                <img src="{{ asset($video->image) }}" alt="{{ $video->title }}">
                                <div class="film-info">
                                    <h3>{{ $video->title }}</h3>
                                    <p>{{ convertMinutesToHours($video->duration) }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button class="film-nav-button film-nav-down">↓</button>
            </div>

            <!-- Zone de contenu principal -->
            <div class="film-content">
                <div class="film-featured" id="filmFeatured">
                    <!-- Image d'arrière-plan du film -->
                    <img class="film-backdrop" src="{{ $comingVideos[0]->image ?? asset('./img/covers/deadpoom.webp') }}"
                        alt="{{ $comingVideos[0]->title ?? 'Film à venir' }}" id="filmBackdrop">

                    <!-- Détails du film -->
                    <div class="film-details">
                        <div class="film-genres">
                            @if (!empty($comingVideos[0]->genres))
                                @foreach ($comingVideos[0]->genres as $genre)
                                    <span class="film-genre">{{ $genre }}</span>
                                @endforeach
                            @endif
                        </div>

                        <h2>{{ $comingVideos[0]->title ?? 'Titre à venir' }}</h2>

                        <div class="film-meta">
                            <div class="film-duration" id="filmDuration">
                                {{ isset($comingVideos[0]->duration) ? convertMinutesToHours($comingVideos[0]->duration) : '' }}
                            </div>
                        </div>

                        <p class="film-description">
                            {{ $comingVideos[0]->description ?? 'Description à venir.' }}
                        </p>

                        <a href="{{ route('films') }}" class="film-play-button">
                            VOIR MAINTENANT SI DISPONIBLE
                            <span class="film-play-icon">▶</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Fag section --}}
    <section class="fag-party">
        <div class="faq-section">
            <div class="container">
                <!-- Première ligne pour les titres -->
                <div class="row text-center mb-3">
                    <div class="col-12">
                        <h2>FAQ</h2>
                        <h1 class="questionnement">Questions fréquemment posées</h1>
                    </div>
                </div>
                <!-- Deuxième ligne pour le contenu -->
                <div class="row">
                    <div class="content-faq col-lg-12 col-md-auto me-auto">
                        <!-- FAQ Item 1 -->
                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer1')">
                                <span>Qu'est-ce que Filmkpamin ?</span>
                                <div>
                                    <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                        style="display: none;"> <!-- Fermer -->
                                    <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                                    <!-- Ouvrir -->
                                </div>
                            </button>
                            <div id="answer1" class="faq-answer col">
                                <p>Filmkpamin est une plateforme de streaming béninoise proposant des contenus média
                                    béninois.</p>
                            </div>
                        </div>
                        <!-- FAQ Item 2 -->
                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer2')">
                                <span>Comment s'inscrire ou se connecter ?</span>
                                <div>
                                    <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                        style="display: none;"> <!-- Fermer -->
                                    <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                                    <!-- Ouvrir -->
                                </div>
                            </button>
                            <div id="answer2" class="faq-answer col">
                                <p>Les utilisateurs peuvent s'inscrire directement sur le site en créant un compte. Sur la
                                    plateforme en haut à droite, cliquez sur le bouton *Se connecter* pour accéder au
                                    formulaire d'inscription.</p>
                            </div>
                        </div>
                        <!-- FAQ Item 3 -->
                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer3')">
                                <span>Quels types de contenus sont disponibles ?</span>
                                <div>
                                    <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                        style="display: none;"> <!-- Fermer -->
                                    <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                                    <!-- Ouvrir -->
                                </div>
                            </button>
                            <div id="answer3" class="faq-answer col">
                                <p>La plateforme offre des contenus média locaux provenant de créateurs africains et de
                                    partenaires.</p>
                            </div>
                        </div>
                        <!-- FAQ Item 4 -->
                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer4')">
                                <span>Y a-t-il des abonnements ?</span>
                                <div>
                                    <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                        style="display: none;"> <!-- Fermer -->
                                    <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                                    <!-- Ouvrir -->
                                </div>
                            </button>
                            <div id="answer4" class="faq-answer col">
                                <p>Oui, Filmkpamin propose un abonnement mensuel basique de 1000 FCFA.</p>
                            </div>
                        </div>
                        <!-- FAQ Item 5 -->
                        <div class="faq-item">
                            <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer5')">
                                <span>Y a-t-il une période d'essai gratuite ?</span>
                                <div>
                                    <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                        style="display: none;"> <!-- Fermer -->
                                    <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                                    <!-- Ouvrir -->
                                </div>
                            </button>
                            <div id="answer5" class="faq-answer col">
                                <p>Oui, Filmkpamin propose souvent une période d'essai gratuite pour les nouveaux
                                    utilisateurs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupération des éléments
            const thumbnails = document.querySelectorAll('.film-thumbnail');
            const thumbnailsContainer = document.getElementById('filmThumbnails');
            const navUp = document.querySelector('.film-nav-up');
            const navDown = document.querySelector('.film-nav-down');
            const backdrop = document.getElementById('filmBackdrop');
            const mediaQuery = window.matchMedia('(max-width: 992px)');

            // Films data avec images
            const films = @json($comingVideos);

            // Fonction pour mettre à jour le film en vedette
            function updateFeaturedFilm(index) {
                // Mettre à jour la classe active
                thumbnails.forEach(thumb => thumb.classList.remove('active'));
                thumbnails[index].classList.add('active');

                // Mettre à jour le contenu
                const film = films[index];

                // Changer l'image d'arrière-plan
                backdrop.src = film.image;
                backdrop.alt = film.title;

                // Mettre à jour les détails du film
                const details = document.querySelector('.film-details');
                const genresContainer = details.querySelector('.film-genres');
                const title = details.querySelector('h2');
                //  const rating = details.querySelector('.film-rating span:last-child');
                const duration = details.querySelector('.film-duration');
                const description = details.querySelector('.film-description');

                // Mise à jour des éléments
                title.textContent = film.title;
                //   rating.textContent = film.rating;
                // Conversion de la durée en format "1h 30m" ou "30m"
                let minutes = parseInt(film.duration, 10);
                let hours = Math.floor(minutes / 60);
                let mins = minutes % 60;
                let durationText = '';
                if (hours > 0) {
                    durationText = hours + 'h';
                    if (mins > 0) {
                        durationText += ' ' + mins + 'm';
                    }
                } else {
                    durationText = mins + 'm';
                }
                duration.textContent = durationText;
                description.textContent = film.description;

                // Mise à jour des genres
                genresContainer.innerHTML = '';
                film.genres.forEach((genre, i) => {
                    const genreSpan = document.createElement('span');
                    genreSpan.className = 'film-genre';
                    genreSpan.textContent = genre;
                    genresContainer.appendChild(genreSpan);
                });
            }

            // Écouteurs d'événements pour les vignettes
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    updateFeaturedFilm(parseInt(index));

                    // Faire défiler si nécessaire pour centrer la vignette
                    scrollToThumbnail(parseInt(index));
                });
            });

            // Fonction pour faire défiler jusqu'à une vignette spécifique
            function scrollToThumbnail(index) {
                const isHorizontal = mediaQuery.matches;
                const thumbnail = thumbnails[index];
                const thumbnailRect = thumbnail.getBoundingClientRect();
                const containerRect = thumbnailsContainer.getBoundingClientRect();

                if (isHorizontal) {
                    // Défilement horizontal pour mobile
                    const centerPosition = thumbnail.offsetLeft - (containerRect.width / 2) + (thumbnailRect.width /
                        2);
                    thumbnailsContainer.scrollTo({
                        left: centerPosition,
                        behavior: 'smooth'
                    });
                } else {
                    // Défilement vertical pour desktop
                    const centerPosition = thumbnail.offsetTop - (containerRect.height / 2) + (thumbnailRect
                        .height / 2);
                    thumbnailsContainer.scrollTo({
                        top: centerPosition,
                        behavior: 'smooth'
                    });
                }
            }

            // Navigation par boutons
            navUp.addEventListener('click', () => {
                const activeIndex = Array.from(thumbnails).findIndex(t => t.classList.contains('active'));
                const newIndex = activeIndex > 0 ? activeIndex - 1 : 0;
                updateFeaturedFilm(newIndex);
                scrollToThumbnail(newIndex);
            });

            navDown.addEventListener('click', () => {
                const activeIndex = Array.from(thumbnails).findIndex(t => t.classList.contains('active'));
                const newIndex = activeIndex < thumbnails.length - 1 ? activeIndex + 1 : thumbnails.length -
                    1;
                updateFeaturedFilm(newIndex);
                scrollToThumbnail(newIndex);
            });

            // Fonction pour le défilement automatique près des extrémités
            function setupAutoscroll() {
                const isHorizontal = mediaQuery.matches;

                // Observer les positions pour le défilement automatique
                thumbnailsContainer.addEventListener('scroll', debounce(function() {
                    const containerRect = thumbnailsContainer.getBoundingClientRect();

                    thumbnails.forEach(thumbnail => {
                        const thumbRect = thumbnail.getBoundingClientRect();

                        if (isHorizontal) {
                            // Logique horizontale (mobile)
                            const isNearStart = thumbRect.left - containerRect.left < 50 &&
                                thumbRect.left > containerRect.left;
                            const isNearEnd = containerRect.right - thumbRect.right < 50 &&
                                thumbRect.right < containerRect.right;

                            if (isNearStart) {
                                thumbnailsContainer.scrollBy({
                                    left: -200,
                                    behavior: 'smooth'
                                });
                            } else if (isNearEnd) {
                                thumbnailsContainer.scrollBy({
                                    left: 200,
                                    behavior: 'smooth'
                                });
                            }
                        } else {
                            // Logique verticale (desktop)
                            const isNearTop = thumbRect.top - containerRect.top < 50 &&
                                thumbRect.top > containerRect.top;
                            const isNearBottom = containerRect.bottom - thumbRect.bottom < 50 &&
                                thumbRect.bottom < containerRect.bottom;

                            if (isNearTop) {
                                thumbnailsContainer.scrollBy({
                                    top: -200,
                                    behavior: 'smooth'
                                });
                            } else if (isNearBottom) {
                                thumbnailsContainer.scrollBy({
                                    top: 200,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    });
                }, 200));
            }

            // Fonction debounce pour éviter trop d'appels
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Responsive: ajuster le comportement en fonction de la taille de l'écran
            function handleScreenChange(e) {
                // Réinitialiser les positions de défilement
                thumbnailsContainer.scrollTo(0, 0);

                // Mettre à jour la configuration du défilement automatique
                setupAutoscroll();
            }

            // Observer les changements de taille d'écran
            mediaQuery.addEventListener('change', handleScreenChange);

            // Configuration initiale
            setupAutoscroll();
        });
    </script>
    <script src="https://kit.fontawesome.com/3a537738e0.js" crossorigin="anonymous"></script>
@endsection
