@extends('frontend.layouts.app')

@section('content')
    <!-- section de visualisation -->
    <section id="bgdark" class="section section--details mt-0 pb-0 section--bg">
        <img src="{{ asset('../img/home/bg.jpg') }}" class="img-fluid rounded-top selecimg" alt="">
        <!-- details content -->
        <div class="container me-auto">
            <div class="row" id="conteneurlecteur">

                <!-- content details-->
                <div class="col-12 col-lg-6" style="margin-top:60px !important;">
                    <div class="card card--details">
                        <div class="row" id="infosvideocontent">
                            <!-- card cover -->
                            <div class="col-12  col-sm-5 col-lg-6 col-xl-5">
                                <div class="card__cover">
                                    <img src="{{ asset('storage/' . $video->photos) }}" alt="{{ $video->title }}">
                                </div>
                                <!-- title -->
                                <div class="">
                                    <h1 class="section__title mt-4" style="color: #fff;">{{ $video->title }}</h1>
                                </div>
                                <!-- end title -->
                            </div>

                            <!-- end card cover -->

                            <!-- card content -->
                            <div class="col-12 col-sm-7 col-lg-6 col-xl-7">
                                <div class="card__content">
                                    <ul class="card__meta">
                                        <li><span>Réalisateur:</span>
                                            @php
                                                // Décoder la chaîne JSON externe
                                                $decodedOuterJson = json_decode($video->directors, true);
                                                // Vérifier et décoder la chaîne JSON interne
                                                $directors = isset($decodedOuterJson[0])
                                                    ? json_decode($decodedOuterJson[0], true)
                                                    : [];
                                            @endphp

                                            @if (is_array($directors))
                                                @foreach ($directors as $director)
                                                    <span style="color: #fd6716">{{ $director }}</span>
                                                @endforeach
                                            @else
                                                <span style="color: #fd6716">Aucun Réalisateur</span>
                                            @endif
                                        </li>
                                        <li><span>Acteurs:</span>
                                            @php
                                                // Vérifier si le JSON externe est correctement formé et contient des données
                                                $decodedOuterJson = json_decode($video->actors, true);
                                                $actors = [];

                                                // Vérifier si le premier élément du tableau décodé existe et est une chaîne JSON valide
                                                if (isset($decodedOuterJson[0]) && is_string($decodedOuterJson[0])) {
                                                    $actors = json_decode($decodedOuterJson[0]);
                                                } else {
                                                    if (is_array($decodedOuterJson[0])) {
                                                        $decodedInnerJson = json_decode($decodedOuterJson[0], true);
                                                        $actors = $decodedOuterJson;
                                                    }
                                                }
                                            @endphp
                                            @if (is_array($actors))
                                                @foreach ($actors as $actor)
                                                    <span style="color: #fd6716">{{ $actor }}</span>
                                                @endforeach
                                            @else
                                                <span style="color: #fd6716">{{ 'Aucun acteur' }}</span>
                                            @endif

                                        </li>
                                        <li><span>Genre:</span>
                                            @foreach (json_decode($video->genres) as $genre)
                                                <span style="color: #fd6716">{{ ucfirst($genre) }}</span>
                                            @endforeach
                                        </li>
                                        <li><span>Années de sortie:</span> <span
                                                style="color: #fd6716">{{ $video->year }}</span></li>
                                        <li><span>Durée :</span> <span
                                                style="color: #fd6716">{{ convertMinutesToHours($video->runtime) }}</span>
                                        </li>
                                        <li><span>Pays:</span>
                                            <span style="color:#fd6716;">{{ $video->country }}</span>
                                        </li>
                                        <li><span>Vues:</span>
                                            <span style="color:#fd6716;">{{ formatNumber($video->views) }}</span>
                                        </li>
                                    </ul>
                                    <div class="card__description" style="">
                                        <p>{{ $video->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content details-->

                <!-- lecteur -->
                <div class="col-12 col-lg-6 mt-5" id="lecteur">
                    <!--  <video-js id="video" class="video-js" controls preload="auto" width="480" height="auto"></video-js>-->
                    <div class="video-container">
                        <video id="video" data-video-id="{{ $video->id }}" data-user-id="{{ auth()->id() }}"
                            poster="{{ asset('storage/' . $video->photos) }}" controlsList="nodownload" oncontextmenu="return false;"></video>

                        <div class="controls-container">
                            <div class="progress-container">
                                <div id="progress-bar">
                                    <div id="progress-filled"></div>
                                </div>
                                <div class="bottom-controls">
                                    <span id="timer" class="mx-2">0:00 / 0:00</span>
                                    <button id="backForward" class="mx-2"><i class="fa-solid fa-backward-step"></i>
                                    </button>
                                    <button id="prevVideo" class="mx-2"><i class="fa-solid fa-backward"></i></button>
                                    <button id="playPause" class="mx-2"><i class="fa-solid fa-play"></i></button>
                                    <button id="nextVideo" class="mx-2"><i class="fa-solid fa-forward"></i></button>
                                    <button id="fastForward" class="mx-2"><i class="fa-solid fa-forward-step"></i>
                                    </button>
                                    <button id="pipButton" class="mx-2">⛶ Pip</button>
                                    <button id="fullscreenButton" class="mx-2">⛶ Plein écran</button>
                                    <input id="volume-control" class="mx-2" type="range" min="0" max="1"
                                        step="0.1" value="0.5" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end lecteur -->

                <!-- interaction sur video -->
                <section class="md_header_footer  col-12 mt-0" style="background: flex; justify-content: space-evenly; ">
                    <div class="md_watch">
                        <span>
                            <i class="fa-solid fa-play"
                                style="background-color: black; border-radius: 100px; width:20px; position: center; padding: 5px 18px 5px 10px; color: white;"></i>
                        </span>
                        <span class="md_watch_text" id="demarrer" style="color: black;">
                            Regarder maintenant
                        </span>
                    </div>
                    <div class="md_content_download ">
                        <form id="videoLikeDislikeForm">
                            <input type="hidden" name="status" id="likeStatus">
                            <div class="md_like mx-5">
                                <button type="submit" class="d-flex flex-column align-items-center justify-content-center"
                                    title="J'aime" id="likeBtn"
                                    onclick="document.getElementById('likeStatus').value='1';">
                                    <i class="icon iconicon ion-md-thumbs-up"
                                        style="font-size: 18px; border-radius: 50%; border: 1px solid #fff; height: 40px; width: 40px; padding: 8px; color: #fd6716;"></i>
                                    <span style="color: #fff;">{{ $video->videoLikes->count() }}</span>
                                </button>
                            </div>
                            <div class="md_dislike mx-5">
                                <button type="submit"
                                    class="d-flex flex-column align-items-center justify-content-center"
                                    title="J'aime pas" id="dislikeBtn"
                                    onclick="document.getElementById('likeStatus').value='0';">
                                    <i class="icon iconicon ion-md-thumbs-down"
                                        style="font-size: 18px; text-center; border-radius:50%; border:1px solid #fff; height:40px; width:40px; padding:8px;color:#fd6716;;"></i>
                                    <span style="color: #fff;">{{ $video->videoDislikes->count() }}</span>
                                </button>
                            </div>
                            {{-- <div class="md_favoris  mx-5">
                                <button type="buttton" class="d-flex flex-column" title="favoris" id="favoris">
                                    <i class="icon iconicon ion-md-heart" style="font-size: 18px; text-center; border-radius:50%; border:1px solid #fff; height:40px; width:40px; padding:8px;color:#fd6716;"></i>
                                    <span style="overflow: hidden"></span>
                                </button>
                            </div> --}}
                            {{--  <div class="md_download  mx-5">
                                <button type="buttton" class="d-flex flex-column" title="Télécharger" id="telecharge">
                                    <i class="icon iconicon ion-md-download"
                                        style="font-size: 18px; text-center; border-radius:50%; border:1px solid #fff; height:40px; width:40px; padding:8px;color:#fd6716;"></i>
                                    <span style="overflow: hidden"></span>
                                </button>
                            </div> --}}

                            <div class="md_share mx-5">
                                <button type="button" class="d-flex flex-column" title="partager" id="partager">
                                    <i class="icon iconicon ion-md-share"
                                        style="font-size: 18px; text-center; border-radius:50%; border:1px solid #fff; height:40px; width:40px; padding:8px;color:#fd6716;"></i>
                                    <span style="overflow: hidden"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- end interaction sur video -->
            </div>
        </div>
        <!-- end details content -->

    </section>
    <!-- end section de visualisation -->
    @include('frontend.video.discover')
@endsection

@section('styles')
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tube.css') }}">
@endsection

@push('javascripts')
    <!-- ========== Start player  ========== -->
    <script src="https://cdn.jsdelivr.net/npm/shaka-player@4.14.1/dist/shaka-player.compiled.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const videoElement = document.getElementById('video');
            const playPauseButton = document.getElementById('playPause');
            const prevButton = document.getElementById('prevVideo');
            const nextButton = document.getElementById('nextVideo');
            const backForward = document.getElementById('backForward');
            const fastForwardButton = document.getElementById('fastForward');
            const pipButton = document.getElementById('pipButton');
            const fullscreenButton = document.getElementById('fullscreenButton');
            const timer = document.getElementById('timer');
            const progressBar = document.getElementById('progress-bar');
            const progressFilled = document.getElementById('progress-filled');
            let controlsContainer = document.querySelector('.controls-container');
            const volumeControl = document.querySelector("#volume-control");

            // recupererer la listes des videos disponible
            @if (isset($Autrescontenus) && $Autrescontenus->isNotEmpty() && auth()->check() && isset($hasabonnement))
                const videoUrls = [
                    "{{ asset('storage/' . $video->video) }}",
                    @foreach ($Autrescontenus as $contenu)
                        "{{ asset('storage/' . $contenu->video) }}"
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                ];
            @else
                const videoUrls = [
                    "{{ asset('storage/' . $video->demo) }}",
                    @foreach ($Autrescontenus as $contenu)
                        "{{ asset('storage/' . $contenu->demo) }}"
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                ];
            @endif

            let currentIndex = 0;

            const player = new shaka.Player(videoElement);

            if (shaka.Player.isBrowserSupported()) {
                try {
                    await player.load(videoUrls[currentIndex]);
                    console.log('Première vidéo chargée avec succès !');
                } catch (error) {
                    console.error('Erreur lors du chargement de la vidéo :', error);
                }
            } else {
                console.error('Shaka Player n\'est pas pris en charge par ce navigateur.');
            }

            // Charger une vidéo spécifique
            async function loadVideo(index) {
                if (index >= 0 && index < videoUrls.length) {
                    try {
                        currentIndex = index;
                        credited = false; // Réinitialiser l'état pour la nouvelle vidéo
                        await player.load(videoUrls[currentIndex]);
                        console.log(`Vidéo ${currentIndex + 1} chargée avec succès !`);
                    } catch (error) {
                        console.error('Erreur lors du chargement de la vidéo :', error);
                    }
                }
            }

            // Lecture/Pause
            playPauseButton.addEventListener('click', () => {
                if (videoElement.paused) {
                    videoElement.play();
                    playPauseButton.innerHTML =
                        '<i class="fa-solid fa-pause"></i>'; // Mise à jour pour l'icône pause
                    conttrolContainer.style.display = "none"; // Cache les contrôles
                } else {
                    videoElement.pause();
                    playPauseButton.innerHTML =
                        '<i class="fa-solid fa-play"></i>'; // Mise à jour pour l'icône lecture
                }
            });

            document.getElementById('demarrer').addEventListener('click', () => {
                if (videoElement.paused) {
                    videoElement.play();
                    playPauseButton.innerHTML =
                        '<i class="fa-solid fa-pause"></i>'; // Mise à jour pour l'icône pause
                    conttrolContainer.style.display = "none"; // Cache les contrôles
                }
            });


            // Volume control functionality
            volumeControl.addEventListener("input", (event) => {
                const volume = event.target.value;
                videoElement.volume = volume;

                // Met à jour la couleur du fond de la barre
                const percentage = volume * 100;
                volumeControl.style.setProperty('--volume-percentage', `${percentage}%`);
            });

            // affichage du block controls 
            videoElement.addEventListener('click', () => {
                const currentDisplay = window.getComputedStyle(controlsContainer).display;

                if (currentDisplay === "block") {
                    controlsContainer.style.display = "none";
                } else {
                    controlsContainer.style.display = "block";
                }
            });


            // Précédent
            prevButton.addEventListener('click', () => {
                if (currentIndex > 0) {
                    loadVideo(currentIndex - 1);
                } else {
                    console.log('Ceci est la première vidéo.');
                }
            });

            // Suivant
            nextButton.addEventListener('click', () => {
                if (currentIndex < videoUrls.length - 1) {
                    loadVideo(currentIndex + 1);
                } else {
                    console.log('Ceci est la dernière vidéo.');
                }
            });

            // Avance rapide
            fastForwardButton.addEventListener('click', () => {
                videoElement.currentTime += 10;
                videoElement.duration += 10;
                console.log('Avance rapide de 10 secondes.');
            });

            // retour rapide 
            backForward.addEventListener('click', () => {
                videoElement.currentTime -= 10;
                console.log('Avance rapide de 10 secondes.');
            });

            // Picture-in-Picture
            pipButton.addEventListener('click', async () => {
                if (document.pictureInPictureElement) {
                    await document.exitPictureInPicture();
                } else {
                    await videoElement.requestPictureInPicture();
                }
            });

            // Plein écran
            fullscreenButton.addEventListener('click', () => {
                if (!document.fullscreenElement) {
                    videoElement.requestFullscreen();
                } else {
                    document.exitFullscreen();
                }
            });


            // Mettre à jour la minuterie et la barre de progression
            videoElement.addEventListener('timeupdate', () => {
                const currentTime = formatTime(videoElement.currentTime);
                const duration = formatTime(videoElement.duration);
                timer.textContent = `${currentTime} / ${duration}`;

                const percentage = (videoElement.currentTime / videoElement.duration) * 100;
                progressFilled.style.width = `${percentage}%`;
            });

            // Cliquer sur la barre de progression
            progressBar.addEventListener('click', (e) => {
                const rect = progressBar.getBoundingClientRect();
                const clickPosition = e.clientX - rect.left;
                const newTime = (clickPosition / progressBar.offsetWidth) * videoElement.duration;
                videoElement.currentTime = newTime;
            });


            // Formater le temps en heures:minutes:secondes
            function formatTime(seconds) {
                const hours = Math.floor(seconds / 3600);
                const minutes = Math.floor((seconds % 3600) / 60);
                const secs = Math.floor(seconds % 60);

                // Si la durée a des heures, les afficher, sinon ignorer
                if (hours > 0) {
                    return `${hours}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
                } else {
                    return `${minutes}:${secs.toString().padStart(2, '0')}`;
                }
            }



            // État pour suivre si le visionnage a été comptabilisé
            let credited = false;

            // Suivi du temps et enregistrement du visionnage
            videoElement.addEventListener('timeupdate', async () => {
                const watchedPercentage = (videoElement.currentTime / videoElement.duration) * 100;
                if (watchedPercentage >= 75 && !credited) {
                    credited = true;
                    //  console.log('75% atteints ! Enregistrement en cours...');
                    try {
                        const response = await fetch('{{ route('partnerrevenue') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                            body: JSON.stringify({
                                videoId: videoElement.dataset.videoId,
                                userId: videoElement.dataset.userId
                            })
                        });
                        const result = await response.json();
                        if (response.ok) {
                            console.log('Visionnage enregistré :', result.message);
                        } else {
                            //  console.error('Erreur lors de l’enregistrement :', result.message);
                        }
                    } catch (error) {
                        //  console.error('Erreur réseau ou serveur :', error);
                    }
                }
            });

        });
    </script>
    <!-- ========== End player  ========== -->


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#videoLikeDislikeForm").submit(function(e) {
            e.preventDefault();

            let status = $("#likeStatus").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('frontend.videos.like_or_dislike', $video) }}",
                data: {
                    status: status
                },
                success: function(data) {
                    $("#likeBtn").html(
                        '<i class="icon iconicon ion-md-thumbs-up" style="font-size: 18px; text-align: center; border-radius: 50%; border: 1px solid #fff; height: 40px; width: 40px; padding: 8px; color: #fd6716;"></i>' +
                        '<span style="color: #fff;">' + data.likes + '</span>');
                    $("#dislikeBtn").html(
                        '<i class="icon iconicon ion-md-thumbs-down" style="font-size: 18px; text-align: center; border-radius: 50%; border: 1px solid #fff; height: 40px; width: 40px; padding: 8px; color: #fd6716;"></i>' +
                        '<span style="color: #fff;">' + data.dislikes + '</span>');
                }
            });
        });
    </script>
@endpush
