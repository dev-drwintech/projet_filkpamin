@extends('backend.layouts.app')

@section('content')
    <style>
        .sign__input {
            color: #ffffffb2;
        }
    </style>
    <div class="sign section--bg" data-bg="{{ asset('img/section/sectionn.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="{{ route('login') }}" class="sign__form" method="post">
                            @csrf
                            <a href="{{ route('home') }}" class="sign__logo">
                                {{-- Le logo --}}
                                <img src="{{ asset('../assets/img/logo.png') }}" alt="">
                            </a>

                            {{-- Se connecter via les reseaux sociaux (Facebook & Google) --}}
                            <div class="sign__group">
                                {{-- google --}}
                                <a href="{{ route('login.google') }}" class="btn btn-danger btn-block"><i
                                        class="icon ion-logo-google" style="font-size: 18px; margin-right: 3px;"></i> Se
                                    connecter avec Google</a>

                                {{-- facebook --}}
                                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block mx-0"><i
                                        class="icon ion-logo-facebook" style="font-size: 18px; margin-right: 3px;"></i> Se
                                    connecter avec Facebook</a>
                            </div>

                            @if (session('error'))
                                <div class="alert alert-danger text-center fs-4" role="alert">
                                    {!! html_entity_decode(session('error')) !!}
                                </div>
                            @endif

                            <div class="sign__group">
                                <input id="email" type="email"
                                    class="sign__input @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="sign__group">
                                <input id="password" type="password"
                                    class="sign__input @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <style>
                                label:before {
                                    border: 1px solid rgba(255, 255, 255, 0.8) !important;
                                }
                            </style>
                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" style="color: #ffffffb2;">Se souvenir de moi</label>
                            </div>

                            <button class="sign__btn" type="submit"
                                style="color: white; font-weight: bold; background-color: linear-gradient(to bottom, #f6870c, #fd6716)">Se
                                connecter</button>

                            @if (Route::has('register'))
                                <span class="sign__text" style="color: white;">J'ai pas de compte ! <a
                                        href="{{ route('register') }}" style="color: #f6870c;">S'inscrire</a></span>
                            @endif

                            @if (Route::has('password.request'))
                                <span class="sign__text"><a href="{{ route('password.request') }}"
                                        style="color: #f6870c;">Mot
                                        de passe oublié ?</a></span>
                            @endif
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
