@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg p-4" style="max-width: 450px; width: 100%;">
            <div class="text-center mb-4">
                <img src="{{ asset('../assets/img/logo.png') }}" alt="Filmkpamin" style="height: 60px;">
                <h2 class="mt-3" style="color: #fd6716;">Désabonnement</h2>
            </div>
            <p class="text-center mb-4">
                Vous êtes sur le point de vous désabonner de notre newsletter.<br>
                Nous sommes désolés de vous voir partir !
            </p>
            <form method="POST" action="{{ route('unsubscribed') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Votre adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com"
                        required style="border: 2px solid #fd6716; box-shadow: none;"
                        onfocus="this.style.boxShadow='none'; this.style.borderColor='#fd6716';"
                        onblur="this.style.boxShadow='none'; this.style.borderColor='#fd6716';">
                </div>
                <button type="submit" class="btn btn-danger w-100">Se désabonner</button>
            </form>
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-muted">Retour à l'accueil</a>
            </div>
        </div>
    </div>
@endsection
