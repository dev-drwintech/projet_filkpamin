@extends('backend.layouts.app')

@section('content')
    <div class="sign section--bg" data-bg="{{ asset('img/section/sectionn.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- registration form -->
                        <form action="{{ route('register') }}" class="sign__form" method="post">
                            @csrf

                            <a href="{{ route('home') }}" class="sign__logo">
                                <img src="{{ asset('../assets/img/logo.png') }}" alt="">
                            </a>

                            <div class="sign__group">
                                <input id="name" type="text" class="sign__input @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Nom">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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

                            <div class="sign__group">
                                <input id="password" type="password"
                                    class="sign__input @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="sign__group">
                                <input id="password-confirm" type="password" class="sign__input"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirmer mot de passe">
                            </div>

                            <style>
                                label:before {
                                    border: 1px solid rgba(255, 255, 255, 0.8) !important;
                                }
                            </style>

                            {{-- Version original --}}
                            <div class="sign__group sign__group--checkbox">
                                <input id="policy" name="policy" type="checkbox"
                                    class=" @error('password') is-invalid @enderror" required>
                                <label for="policy">J'ai lu et j'accepte la <a href="{{ route('politique') }}"
                                        style="color: #fd6716; ">Politique de confidentialité</a></label>

                                @error('policy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="sign__btn" type="submit" style="color: white;">S'inscrire</button>

                            <p class="text-center" style="color: white">OU</p>

                            {{-- Se connecter via les reseaux sociaux (Facebook & Google) --}}
                            <div class="sign__group">
                                {{-- Google --}}
                                <a href="{{ route('login.google') }}" class="btn btn-danger btn-block"><i
                                        class="icon ion-logo-google"
                                        style="font-size: 18px; margin-right: 3px;"></i>S'inscrire avec Google</a>

                                {{-- Facebook --}}
                                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block mx-0"><i
                                        class="icon ion-logo-facebook "
                                        style="font-size: 18px; margin-right: 3px;"></i>S'inscrire avec Facebook</a>
                            </div>

                            <span class="sign__text" style="color: white">J'ai déjà un compte ? <a
                                    href="{{ route('login') }}" style="color: #f6870c;">Se connecter</a></span>
                        </form>
                        <!-- registration form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
