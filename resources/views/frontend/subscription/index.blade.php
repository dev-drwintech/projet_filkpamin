@extends('frontend.layouts.app')

@section('content')
    <!-- page title -->
    <section class="banner w-100">
        <h1>Nos Tarifs</h1>
        <p id="animated-title" class="title section__title" style="font-size:25px !important;"></p>
    </section>
    <div class="section__wrap">
        <!-- section title -->
        <!-- end section title -->
    </div>
    <!-- end page title -->

    <!-- pricing -->
    <div class="section">
        <div class="container">
            <!-- message alerte -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInRight"
                    role="alert" id="alertmessage">
                    <div class="mx-2">
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInRight"
                    role="alert" id="alertmessage">
                    <div class="mx-2">
                        {{ session('success') }}
                    </div>
                </div>
            @endif


            @php
                $active = null;
                $plan = null;
            @endphp

            <!-- Vérifiez si l'utilisateur est connecté -->
            @if (auth()->check() && auth()->user()->role->nom !== 'admin')
                @if ($activePayments->isEmpty())
                    @php
                        $active = 'inactive';
                    @endphp
                @else
                    @foreach ($activePayments as $payment)
                        @php
                            $active = $payment->status;
                            $plan = $payment->PlanAbonnement;
                        @endphp
                    @endforeach
                @endif
            @endif

            {{-- Forfaits secion --}}
            <div class="title mb-5 col text-light d-flex justify-content-center align-items-center">
                <p class=""><span class="">Découvrez nos plans tarifaires</span> <br> &nbsp; <span
                        class="mt-3">adaptés à vos envies !</span></p>
            </div>
            <div class="pricing-subscrb">
                <!-- Plan Basique -->
                <div class="plan">
                    <h2 class="basiquename">Basique</h2>
                    <p class="price">1000 FCFA / mois</p>
                    <ul class="features">
                        <li>Pas de publicité
                            <hr class="barreli">
                        </li>
                        <li>Accès à une bibliothèque complète
                            <hr class="barreli">
                        </li>
                        <li>Streaming en qualité HD
                            <hr class="barreli">
                        </li>
                        <li class="no-feature">Regardez sur 1 appareil à la fois
                            <hr class="barreli">
                        </li>
                        <li class="no-feature">Affichage hors ligne</li>
                    </ul>
                    @if ($plan == 'Basique')
                        <a href="javascript:void(0)" class="cta disabled"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Abonnement actif</a>
                    @else
                        <a href="javascript:void(0)" class="cta payme" plan="Basique" data-amount="1000"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce plan</a>
                    @endif
                </div>

                <!-- Plan Standard -->
                <div class="plan d-none">
                    <h2 class="standardname">Standard</h2>
                    <p class="price">1500 FCFA / mois</p>
                    <ul class="features">
                        <li>Pas de publicité
                            <hr class="barreli">
                        </li>
                        <li>Accès à une bibliothèque complète
                            <hr class="barreli">
                        </li>
                        <li>Streaming en qualité Full HD
                            <hr class="barreli">
                        </li>
                        <li>Regardez sur n'importe quel appareil
                            <hr class="barreli">
                        </li>
                        <li>Diffusez sur 2 appareils à la fois
                            <hr class="barreli">
                        </li>
                        <li>Affichage hors ligne </li>
                    </ul>
                    @if ($plan == 'Standard')
                        <a href="javascript:void(0)" class="cta disabled"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Abonnement actif</a>
                    @else
                        <a href="javascript:void(0)" class="cta payme" plan="Standard" data-amount="1500"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce plan</a>
                    @endif
                </div>

                <!-- Plan Premium -->
                <div class="plan d-none">
                    <h2 class="premiumname">Premium</h2>
                    <p class="price">5000 FCFA / mois</p>
                    <ul class="features">
                        <li>Pas de publicité
                            <hr class="barreli">
                        <li>Accès à une bibliothèque complète
                            <hr class="barreli">
                        <li>Streaming en qualité 4K
                            <hr class="barreli">
                        <li>Regardez sur n'importe quel appareil
                            <hr class="barreli">
                        <li>Diffusez sur 4 appareils à la fois
                            <hr class="barreli">
                        <li>Affichage hors ligne
                    </ul>
                    @if ($plan == 'Premium')
                        <a href="javascript:void(0)" class="cta disabled"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Abonnement actif</a>
                    @else
                        <a href="javascript:void(0)" class="cta payme" plan="Premium" data-amount="5000"
                            @if (auth()->check() && auth()->user()->role->nom == 'admin') isadmin="true" @endif
                            data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce plan</a>
                    @endif
                </div>
            </div>
            </section>
        </div>
    </div>
    <!-- end pricing -->

    <!-- Alert infos -->
    <div class=" alert-dismissible fade show animate__animated animate__fadeInRight" role="alert" id="alertNonconected">
        <div>
            Vous devez être connecté pour effectuer un paiement.
            <br>
            <a href="{{ route('login') }}" class=" offset-md-5 -text-center">Se connecter</a>
        </div>
    </div>
@endsection
