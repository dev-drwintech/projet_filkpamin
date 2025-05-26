@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2 style="color: black;">Catégories</h2>

                    <span class="main__title-stat" style="color: black;">{{ formatNumber($categories->total()) }} Total</span>

                    <a href="{{ route('videos_category.create') }}" class="main__title-link">Ajouter une catégorie</a>
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
                            <th>NOM</th>
                            <th>STATUS</th>
                            <th>DATE DE CRÉATION</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>

                        <tbody id="Tttd">

                        @foreach($categories as $categorie)
                        <tr>

                            <td>
                                <div class="main__table-text">{{ $categorie->nom }}</div>
                            </td>

                           <td>
                                <div class="main__table-text @if($categorie->status == 1) main__table-text--green"> Publié @else main__table-text--red"> Non publié @endif</div>
                            </td>
                            <td>
                                <div class="main__table-text" title="{{ $categorie->created_at }}">{{ $categorie->created_at ? categorie->created_at->diffForHumans() : 'Non défini' }}</div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                    <a href="#" class="main__table-btn main__table-btn--banned">
                                        <i class="icon ion-ios-lock"></i>
                                    </a>
                                    <a href="#" class="main__table-btn main__table-btn--view">
                                        <i class="icon ion-ios-eye"></i>
                                    </a>
                                    <a href="{{ route('videos_category.edit', $categorie->id) }}" class="main__table-btn main__table-btn--edit">
                                        <i class="icon ion-ios-create"></i>
                                    </a>

                                    <form action="{{ route('videos_category.destroy', $categorie->id) }}" method="POST" onsubmit="return confirm('Vous êtes sûr de vouloir supprimé définitivement cette vidéo ?')">
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
                    @if($categories->total() > 20)
                        <span>20 à {{ $categories->total() }}</span>
                    @else
                        <span>{{ $categories->total() }} à {{ $categories->total() }}</span>
                    @endif
                    {{ $categories->links('backend.custom') }}
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
@endsection

@section('modal')

@endsection
