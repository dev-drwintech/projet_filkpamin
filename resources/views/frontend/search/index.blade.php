@extends('frontend.layouts.app')

@section('content')
    <!-- Banner -->
    <section class="banner w-100">
        <h1>Trouvez vos préférences</h1>
        <h2 class="section__title tz" style="color: #fd6716; text-align:center;">Résultats de recherche
            "{{ $query }}"</h2>
    </section>
    <!-- end page title -->
    <!-- catalog -->
    <div class="catalog mt-4">
        <div class="container">
            <div class="row">
                @forelse($results as $result)
                    <!-- card -->
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                        <div class="card">
                            <div class="card__cover">
                                <img src="{{ asset('storage/' . $result->photos) }}" alt="{{ $result->title }}" />
                                <!-- Vidéo qui sera affichée au survol -->
                                <video class="card__video" muted preload="metadata">
                                    <source src="{{ asset('storage/' . $result->demo) }}" type="video/mp4">
                                </video>
                                <a href="{{ route('frontend.videos.show', $result->slug) }}" class="card__play">
                                    <i class="icon ion-ios-play" style="color:#ff6a00;"></i>
                                </a>
                                {{-- <span
                                    class="card__rate @if ($result->imdb_rating >= 7) card__rate--green @else card__rate--red @endif">{{ $result->imdb_rating }}</span> --}}
                            </div>
                            <div class="card__content">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <span class="" style="color: #fff"><i
                                                class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($result->runtime) }}
                                        </span>
                                    </div>
                                    <div>
                                        @if ($result->views == 0)
                                            <span></span>
                                        @else
                                            <span class="" style="color:#fff;font-weight:600;">
                                                {{ formatNumber($result->views) }}
                                                <i class="fa-regular fa-eye mx-1"></i>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <h3 class="card__title">
                                    <a href="{{ route('frontend.videos.show', $result->slug) }}"
                                        style="color: #fff;font-weight:400;">{{ $result->title }}</a>
                                </h3>
                                <span class="card__category">
                                    @php($i = 0)
                                    @foreach (json_decode($result->genres) as $genre)
                                        @if ($i >= 3)
                                            @break

                                        @else
                                            <span style="font-size:18px;">{{ ucfirst($genre) }}</span>
                                            @php($i++)
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                @empty
                    <div class="col">
                        <h2
                            style="color: #ffd80e; text-align: center; margin: 20px 0; background: #212529; padding: 20px 8px; border-radius: 5px;">
                            Aucun résultat lié à votre recherche !
                        </h2>
                    </div>
                @endforelse
            </div>

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    @if ($results->total() > 20)
                        <span style="color: #fff">20 à {{ $results->total() }}</span>
                    @else
                        <span style="color: #fff">{{ $results->total() }} à {{ $results->total() }}</span>
                    @endif
                    {{ $results->withQueryString()->links('frontend.pagination') }}
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
    <!-- end catalog -->
@endsection
