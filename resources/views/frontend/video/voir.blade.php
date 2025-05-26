@extends('frontend.layouts.app')

@section('content')
    <!-- details -->
    <section id="bgdark" class="section section--details mt-0 pb-0 section--bg">        
        <img src="{{ asset('/image/Spiderman.png') }}" class="img-fluid rounded-top selecimg" alt="">
        <!-- details content -->
        <div class="container me-auto">
            <div class="row">
                <!-- content -->
                <div class="col-12 col-lg-6" style="margin-top:60px !important;">
                    <div class="card card--details">
                        <div class="row">
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
                                                style="color: #fd6716">{{ convertMinutesToHours($video->runtime) }}</span></li>
                                        <li><span>Pays:</span>
                                            <span style="color:#fd6716;">{{ $video->country }}</span>
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
                <!-- end content -->
                 
                <!-- lecteur démo -->
                <div class="col-12 col-lg-6 mt-5" id="lecteur">
                    <video-js id="video-demo" class="video-js" controls preload="auto" width="640" height="360"
                        poster="{{ asset('storage/' . $video->photos) }}" data-setup="{}">
                        <source src="{{ asset('storage/' . $video->demo) }}" type="video/mp4">
                    </video-js>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <!-- end lecteur -->

                <!-- lecteur video -->
                <!-- <div class="" id="lecteur">
                    <video-js id="video" class="video-js vjs-big-play-centered" controls preload="auto" width="640" height="360"
                        poster="{{ asset('storage/' . $video->photos) }}" data-setup="{}">
                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                    </video-js>
                </div> -->
                <!-- end lecteur -->
                
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12">
                            <!-- content tabs -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                                    <div class="row">
                                        <a href="javascript:void(0);" onclick="history.back();" class="btn btn-info" style="color: white;">Retour</a>&emsp;&emsp;
                                        <a href="{{ route('admin.approuverVideo', $video->id) }}" class="btn btn-success">Publier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </section>
@endsection

@section('styles')
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tube.css') }}">
@endsection

@push('javascripts')
    <script src='https://vjs.zencdn.net/7.5.4/video.js'></script>
    <script>
        videojs('video-demo')
        videojs('video')
    </script>

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