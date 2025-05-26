@extends('backend.layouts.app')

@section('content')
    <div class="sign section--bg" data-bg="{{ asset('img/section/sectionn.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- reset form -->
                        <form action="{{ route('password.email') }}" class="sign__form" method="post">
                            @csrf

                            <a href="{{ route('home') }}" class="sign__logo">
                                <img src="{{ asset('../assets/img/logo.png') }}" alt="">
                            </a>

                            <div style="color: white; text-align: center; margin-bottom: 12px;">Réinitialiser le mot de
                                passe</div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="sign__group">
                                <input id="email" type="email"
                                    class="sign__input @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="sign__btn" type="submit" style="color: white">Réinitialiser</button>

                            <div class="sign__group" style="display: none;">
                                <a href="{{ route('login.google') }}" class="btn btn-danger btn-block"><i
                                        class="icon ion-logo-google" style="font-size: 18px; margin-right: 3px;"></i>
                                    Connectez-vous avec Google</a>
                                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block"><i
                                        class="icon ion-logo-facebook" style="font-size: 18px; margin-right: 3px;"></i>
                                    Connectez-vous avec Facebook</a>
                                {{-- <a href="{{ route('login.github') }}" class="btn btn-dark btn-block"><i class="icon ion-logo-google" style="font-size: 18px; margin-right: 3px;"></i>Connectez-vous avec  Github</a> --}}
                            </div>
                        </form>
                        <!-- reset form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
