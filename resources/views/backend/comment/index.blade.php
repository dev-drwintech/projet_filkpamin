@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2 style="color: black;">Commentaires</h2>

                    <span class="main__title-stat" style="color: black;">{{ formatNumber($comments->total()) }} Total</span>

                    <div class="main__title-wrap">
                        <!-- filter sort -->
                        <div class="filter" id="filter__sort" style="color: black; border:1px solid grey; margin-top: 10px; padding: 5px; height: 60px; border-radius: 10px;">
                            <span class="filter__item-label" style="color: black;">Tier par:</span>

                            <div class="filter__item-btn dropdown-toggle"
                                 role="navigation" id="filter-sort" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Date de création">
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown"
                                aria-labelledby="filter-sort">
                                <li style="color: black;">Date created</li>
                                <li style="color: black;">Pricing plan</li>
                                <li style="color: black;">Status</li>
                            </ul>
                        </div>
                        <!-- end filter sort -->

                        <!-- search -->
                        <form action="#" class="main__title-form" style="color: black; margin-top: -30px; border: 1px solid grey; border-radius: 20px;">
                            <input type="text" placeholder="Rechercher un utilisateur..." style="color: black;">
                            <button type="button">
                                <i class="icon ion-ios-search" style="color: black;"></i>
                            </button>
                        </form>
                        <!-- end search -->
                    </div>
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

                            <th>TITRE DE LA VIDÉO</th>
                            <th>NOM D'UTILISATEUR</th>
                            <th>TEXTE DU COMMENTAIRE</th>
                            <th>ID PARENT</th>
                            <th>CRÉÉ À</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>

                        <tbody id="Tttd">

                        @foreach($comments as $comment)

                            <tr>

                                <td>
                                    <div class="main__table-text">
                                        <a href="{{ route('frontend.videos.show', $comment->video->slug) }}">
                                            {{ $comment->video->title }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-text">
                                        <a href="{{ route('frontend.users.show', $comment->user->id) }}">
                                            {{ $comment->user->name }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div
                                        class="main__table-text">{{ \Illuminate\Support\Str::limit($comment->comment_text, 20) }}
                                    </div>
                                </td>
                                <td>
                                    <div
                                        class="main__table-text">
                                        @if(!empty($comment->parent_id)) {{ $comment->parent_id }} @else NULL @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-text" title="{{ $comment->created_at }}">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <a href="{{ route('comments.show', $comment->id) }}" class="main__table-btn main__table-btn--banned">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="{{ route('comments.edit', $comment->id) }}"
                                           class="main__table-btn main__table-btn--edit">
                                            <i class="icon ion-ios-create"></i>
                                        </a>

                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure to delete data?')">
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
                    @if($comments->total() > 20)
                        <span>20 à {{ $comments->total() }}</span>
                    @else
                        <span>{{ $comments->total() }} à {{ $comments->total() }}</span>
                    @endif
                    {{ $comments->links('backend.custom') }}
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
@endsection
