@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- main title -->
        <div class="col-12">
            <div class="main__title">
                <h2 style="color: black;">Utilisateurs</h2>

                <span class="main__title-stat fs-3" style="color: black;">{{ formatNumber($users->total()) }} Total</span>

            </div>

            @if(session()->has('message'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

        </div>
        <!-- end main title -->

        <!-- users -->
        <div class="col-12" style="background-color: white !important;">
            <div class="main__table-wrap">
                <table class="main__table rounde-3">
                    <thead>
                        <tr>

                            <th>INFO BASIQUE</th>
                            <th>STATUS</th>
                            <th>RÔLE</th>
                            <th>DATE DE CRÉATION</th>
                            <th>DDC</th>
                            <th>IP</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody id="Tttd">

                        @foreach($users as $user)

                        <tr>

                            <td>
                                <div class="main__user">
                                    <div class="main__avatar">
                                        <img src="{{ $user->avatar }}" alt="">
                                    </div>
                                    <div class="main__meta">
                                        <h3>{{ $user->name }}</h3>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="main__table-text main__table-text--green">{{ $user->email_verified_at == null ? 'Non Vérifié' : 'Vérifié' }}</div>
                            </td>
                            <td>
                                <div class="main__table-text">{{ $user->role->nom }}</div>
                            </td>
                            <td>
                                <div class="main__table-text @if(!$user->created_at) main__table-text--red @endif" title="{{ $user->created_at ?? '' }}">
                                    {{ $user->created_at ? $user->created_at->diffForHumans() : 'Pas disponible!' }}
                                </div>
                            </td>
                            <td>
                                <div class="main__table-text @if(!$user->last_login_at) main__table-text--red @endif" title="{{ $user->last_login_at }}">
                                    {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Jamais' }}
                                </div>
                            </td>
                            <td>
                                <div class="main__table-text @if(!$user->last_login_ip) main__table-text--red @endif" style="text-align: center!important;">
                                    {{ $user->last_login_ip ?? 'Ip indisponible  ' }}
                                </div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                    <form action="{{ route('users.block', $user->id) }}" method="POST" class="block-user-form">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="main__table-btn main__table-btn--banned mx-1">
                                            <i class="icon ion-ios-lock"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('users.unblock', $user->id) }}" method="POST" class="block-user-form">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="main__table-btn main__table-btn--banned mx-1">
                                            <i class="icon ion-ios-unlock"></i>
                                        </button>
                                    </form>



                                    <a href="#" class="main__table-btn main__table-btn--view">
                                        <i class="icon ion-ios-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="main__table-btn main__table-btn--edit">
                                        <i class="icon ion-ios-create"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete data?')">
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
                @if($users->total() > 20)
                <span>20 à {{ $users->total() }}</span>
                @else
                <span>{{ $users->total() }} à {{ $users->total() }}</span>
                @endif
                {{ $users->links('backend.custom') }}
            </div>
        </div>
        <!-- end paginator -->
    </div>
</div>
@endsection