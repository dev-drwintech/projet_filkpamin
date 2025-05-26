<div class="col-12 col-lg-12 col-xl-12">
    <div class="row">
        <!-- section title -->
        <div class="col-12">
            <h2 class="section__title">Regarder plus de vidéos similaires...
            </h2>
        </div>
        <!-- end section title -->

        @if ($similarVideos->isEmpty())
            <h3 style="color: #fff; text-align:center !important;">Aucune vidéos similaire !</h3>
        @else
            @foreach ($similarVideos as $similarVideo)
                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{ asset('storage/' . $similarVideo->photos) }}" alt="{{ $similarVideo->title }}">
                            <!-- Vidéo qui sera affichée au survol -->
                            <video class="card__video" muted preload="metadata">
                                <source src="{{ asset('storage/' . $similarVideo->demo) }}" type="video/mp4">
                            </video>
                            <a href="{{ route('frontend.videos.show', $similarVideo->slug) }}" class="card__play">
                                <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <div class="d-flex justify-content-between">
                                <div>

                                    <span class="" style="color:#3d3ddb"><i
                                            class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($similarVideo->runtime) }}
                                    </span>
                                </div>
                                <div>
                                    @if ($similarVideo->views == 0)
                                        <span></span>
                                    @else
                                        <span class=""
                                            style="color:#3d3ddb;font-weight:600;">{{ formatNumber($similarVideo->views) }}
                                            <i class="fa-regular fa-eye mx-1"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <h3 class="card__title"><a href="{{ route('frontend.videos.show', $similarVideo->slug) }}"
                                    style="color: black;font-size:18px;">{{ $similarVideo->title }}</a></h3>
                            <span class="card__category" style="font-size:18px;">
                                @php($i = 0)
                                @foreach (json_decode($similarVideo->genres) as $genre)
                                    @if ($i >= 3)
                                    @break

                                @else
                                    {{ ucfirst($genre) }}
                                    @php($i++)
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
            <!-- end card -->
        @endforeach
    @endif
</div>
</div>
