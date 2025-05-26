@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card" style="border: 1px solid #fff; margin-top:150px; font-size:18px;">
                    <p class="card-header text-center  p-3 rounded-3" style="background: #fff; color:#000;"><span
                            class="fs-6 text-light">{{ __('Vérifier votre address email ') }}  <span
                                class="text-warning" style="color: #ff6a00; font-size:18px;">{{ auth()->user()->email }}</span> 
                            {{ __('afin  d\'activer votre compte personnel') }}</span> </p>

                    <div class="card-body p-4">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre address email.') }}
                            </div>
                        @endif

                        {{ __("Avant de proccéder, s'il vous plaît veuillez vérifier votre address email via le lien de vérification envoyé à votre address.") }}
                        {{ __("Si vous n'avez pas reçu d'email cliquez sur le bouton.") }}
                        <br>
                        <form class="d-flex justify-content-center mt-1" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link m-0 align-baseline mt-3" style="background: #ff6a00;padding:10px; text-decoration:none; color:#fff;">{{ __('Renvoyez le lien de vérification') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
