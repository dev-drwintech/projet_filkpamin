@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- main title -->
        <div class="col-12">
            <div class="main__title">
                <h2 style="color: black;">Vidéo en attente de validation</h2>

                <span class="main__title-stat" style="color: black;">{{ $videosEnAttente->total() }} Total</span>

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
                            <th>PARTENAIRE</th>
                            <th>GENRE</th>
                            <th>TYPE</th>
                            <th>STATUT</th>
                            <th>DATE DE CRÉATION</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody id="Tttd">

                        @forelse($videosEnAttente as $video)
                            <tr>

                                <td>
                                    <div class="main__table-text">{{ $video->title }}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{ $video->user->name ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{ implode(', ', json_decode($video->genres)) }}</div>
                                </td>
                                <td>
                                    <div class="main__table-text">{{ ucfirst($video->type) }}</div>
                                </td>
                                <td>
                                    <div class="main__table-text @if($video->status == 1) main__table-text--green"> Publié @else main__table-text--red"> En attente @endif</div>
                                </td>
                                <td>
                                    <div class="main__table-text" title="{{ $video->created_at }}">{{ $video->created_at->diffForHumans() }}</div>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <!-- <a href="#" class="main__table-btn main__table-btn--banned">
                                            <i class="icon ion-ios-lock"></i>
                                        </a> -->
                                        <a href="{{ route('admin.videos.voir', $video->id) }}" class="main__table-btn main__table-btn--view">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="{{ route('videos.edit', $video->id) }}" class="main__table-btn main__table-btn--edit">
                                            <i class="icon ion-ios-create"></i>
                                        </a>
                                        <button class="btn btn-primary"> 
                                            <a href="{{ route('admin.approuverVideo', $video->id) }}" style="color: white; font-size: 16px;">Publier</a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="main__table-text"> Aucune vidéo en attente de validation. </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            </div>
        </div>
        <!-- end users -->

        <!-- paginator -->
        <div class="col-12">
            <div class="paginator-wrap">
                @if($videosEnAttente->total() > 20)
                <span>20 à {{ $videosEnAttente->total() }}</span>
                @else
                <span>{{ $videosEnAttente->total() }} à {{ $videosEnAttente->total() }}</span>
                @endif
                {{ $videosEnAttente->links('backend.custom') }}
            </div>
        </div>
        <!-- end paginator -->
    </div>
</div>
@endsection

@section('modal')

@endsection