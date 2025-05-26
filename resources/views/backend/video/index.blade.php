@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2 style="color: black;">Catalogues</h2>

                    <span class="main__title-stat" style="color: black;">{{ $videos->total() }} Total</span>

                    <a href="{{ route('videos.create') }}" class="main__title-link">Ajouter une vidéo</a>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-{{ session('type')}}">
                        {{ session('message') }}
                    </div>
                @endif

            </div>
            <!-- end main title -->

            <!-- users -->
            <div class="col-12">
                <div class="main__table-wrap">
                    <table class="main__table">
                        <thead>
                        <tr>
                            <th>TITRE</th>
                            <th>ÉVALUATION</th>
                            <th>TYPE</th>
                            <th>VUES</th>
                            <th>STATUT</th>
                            <th>DATE DE CRÉATION</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>

                        <tbody id="Tttd">

                        @foreach($videos as $video)
                        <tr>

                            <td>
                                <div class="main__table-text">{{ $video->title }}</div>
                            </td>
                            <td>
                                <div class="main__table-text main__table-text--rate"><i class="icon ion-ios-star"></i> {{ $video->imdb_rating }}</div>
                            </td>
                            <td>
                                <div class="main__table-text">{{ ucfirst($video->type) }}</div>
                            </td>
                            <td>
                                <div class="main__table-text">{{ formatNumber($video->views) }}</div>
                            </td>
                            <td>
                                <div class="main__table-text @if($video->status == 1) main__table-text--green"> Publié @else main__table-text--red"> Non publié @endif</div>
                            </td>
                            <td>
                                <div class="main__table-text" title="{{ $video->created_at }}">{{ $video->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                    <a href="#" class="main__table-btn main__table-btn--banned">
                                        <i class="icon ion-ios-lock"></i>
                                    </a>
                                    <a href="#" class="main__table-btn main__table-btn--view">
                                        <i class="icon ion-ios-eye"></i>
                                    </a>
                                    <a href="{{ route('videos.edit', $video->id) }}" class="main__table-btn main__table-btn--edit">
                                        <i class="icon ion-ios-create"></i>
                                    </a>

                                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="main__table-btn main__table-btn--delete">
                                            <i class="icon ion-ios-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end users -->

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    @if($videos->total() > 20)
                        <span>20 à {{ $videos->total() }}</span>
                    @else
                        <span>{{ $videos->total() }} à {{ $videos->total() }}</span>
                    @endif
                    {{ $videos->links('backend.custom') }}
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
@endsection

@section('modal')

@endsection
