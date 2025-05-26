@extends('backend.layouts.app')

@section('content')
<div class="sign section--bg" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- reset form -->
                    <form action="{{ route('password.update') }}" class="sign__form" method="post">
                        @csrf

                        <a href="{{route('home')}}" class="sign__logo">
                            <img src="{{ asset('../assets/img/logo.png') }}" alt="">
                        </a>

                        <div style="color: white; text-align: center; margin-bottom: 12px;">Réinitialiser le mot de passe</div>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="sign__group">
                            <input id="email" type="email" class="sign__input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="sign__group">
                            <input id="password" type="password" class="sign__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="sign__group">
                            <input id="password-confirm" type="password" class="sign__input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                        </div>

                        <button class="sign__btn" type="submit"  style="color: black">Réinitialiser mot de passe</button>

                        
                    </form>
                    <!-- reset form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
