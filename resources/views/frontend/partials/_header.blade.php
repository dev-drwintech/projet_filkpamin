<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content d-flex justify-content-between">
                    <!-- header logo -->
                    <a href="/" class="header__logo">
                        <img src="{{ asset('../assets/img/logo.png') }}" alt="">
                    </a>
                    <!-- end header logo -->

                    <!-- header nav -->
                    <ul class="header__nav " style="padding-left:10px;">


                        <li class="header__nav-item">
                            <a href="{{ route('home') }}" class="header__nav-link">Accueil</a>
                        </li>

                        <li class="header__nav-item">
                            <a href="{{ route('films') }}" class="header__nav-link">Films</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('series') }}" class="header__nav-link">Séries</a>
                        </li>

                        <li class="header__nav-item">
                            <a href="{{ route('subscriptions.index') }}" class="header__nav-link">Abonnements</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('about') }}" class="header__nav-link">À propos</a>
                        </li>

                         <li class="dropdown petit-format  d-lg-inline-block topbar-dropdown">
                            <div class="gtranslate_wrapper"
                                style="position: fixed; top: 71px; right: 20px; z-index: 9999;"></div>
                        </li>

                        <li class="header__nav-item">
                            <form action="{{ route('search.index') }}" class="header__search">
                                <input class="header__search-input" type="text" name="q"
                                    placeholder="Rechercher Films,Séries..."
                                    value="@if (!empty($query)) {{ $query }} @endif">
                                <button class="header__search-button" type="submit">
                                    <i class="icon ion-ios-search"></i>
                                </button>
                                <button class="header__search-close" type="button">
                                    <i class="icon ion-md-close"></i>
                                </button>
                            </form>

                            <button class="header__search-btn" type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                        </li>

                    </ul>
                    <!-- end header nav -->
                    <!-- Language Switcher (gTranslate) -->

                    <!-- header auth -->
                    @guest
                        <a href="{{ route('login') }}" class="header__sign-in">
                            <i class="icon ion-ios-log-in"></i>
                            <span>Se connecter</span>
                        </a>
                    @else
                        <div class="header__auth">
                            <div class="dropdown ml-2 avatarmenu">
                                <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (auth()->user()->avatar)
                                        {{-- <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}"
                                            style="border: 2px solid yellow; border-radius: 50%; width: auto; height: 40px;"> --}}

                                        <h3
                                            style="border: 2px solid yellow; border-radius: 50%; padding: 8px; width: auto; height: 45px; text-align: center;">
                                            {{ strtoupper(substr(auth()->user()->email, 0, 2)) }}</h3>
                                    @else
                                        {{-- <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                            alt="{{ auth()->user()->name }}"
                                            style="border: 2px solid yellow; border-radius: 50%; width: auto; height: 40px;"> --}}
                                        <h3
                                            style="border: 2px solid yellow; border-radius: 50%; padding: 8px; width: auto; height: 45px; text-align: center;">
                                            {{ strtoupper(substr(auth()->user()->email, 0, 2)) }}</h3>
                                    @endif
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    @if (auth()->user()->role->nom == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                            <i class="icon ion-ios-home" style="margin-right: 5px"></i>Tableaux de Bord
                                        </a>
                                    @elseif(auth()->user()->role->nom == 'partenaire')
                                        <a class="dropdown-item"
                                            href="{{ auth()->user()->email_verified_at == null ? route('emailverify') : route('frontend.partenaire.dashboard', auth()->user()->id) }}">
                                            <i class="icon ion-ios-home" style="margin-right: 5px"></i>Tableaux de Bord
                                        </a>
                                    @endif
                                    <a class="dropdown-item"
                                        href="{{ auth()->user()->email_verified_at == null ? route('emailverify') : route('frontend.user.dashboard', auth()->id()) }}">
                                        <i class="icon ion-ios-person" style="margin-right: 5px"></i>
                                        Mon espace personnel
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon ion-ios-log-out" style="margin-right: 5px"></i>
                                        {{ __('Déconnexion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <!-- end header auth -->
                        @endguest

                            <li class="dropdown d-none grand-format d-lg-inline-block topbar-dropdown">
                                <div class="gtranslate_wrapper"
                                    style="position: fixed; top: 71px; right: 20px; z-index: 9999;"></div>
                                <script>
                                    window.gtranslateSettings = {
                                        "default_language": "fr",
                                        "switcher_horizontal_position": "inline",
                                        "float_switcher_open_direction": "bottom"
                                    }
                                </script>
                                <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
                            </li>
                        <!-- header menu btn -->
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- end header menu btn -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    .section {
        overflow: hidden;
    }

    @media only screen and (width: 1024px) {
        .home .offset-md-4 {
            margin-left: 0 !important;
        }

        .home {
            display: flex !important;
            flex-wrap: nowrap !important;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            align-content: center;
        }

        #closemobile {
            display: block !important;
            position: relative;
            width: 100%;
        }

        #closemobile .header__btn {
            position: absolute;
            top: -2px;
            right: -14px;
            padding: 5px;
            border-radius: 50%;
            background: #ffd80e;
            font-weight: 600;
            font-size: 15px;
            height: 30px;
            width: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    @media only screen and (width: 768px) {
        .home {
            display: flex !important;
            flex-direction: column !important;
            flex-wrap: nowrap !important;
            justify-content: center !important;
            align-items: center !important;
            height: 800px !important;
        }

        .home .offset-md-4 {
            margin-left: 0 !important;
        }

        .home .offset-md-1 {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .home .offset-md-1 img {
            height: 100px;
        }

        .home div .h3 {
            font-size: 16px;
        }

        .home div .look {
            color: black;
            background-color: white;
            width: 180px !important;
            border: 2px solid white;
            border-radius: 30px;
            padding: 5px 5px 5px 5px !important;
            gap: 12px !important;
            font-family: Abel;
            font-size: 15px;
        }

        .clickmeinfos {
            margin: 3rem !important;
        }

        .home div .info {
            padding: 8px 8px 8px 8px !important;
        }

        .card__cover {
            width: 130px;
            height: 180px;
        }

        .card__content .d-flex {
            display: flex !important;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: baseline;
            width: 130px;
            align-content: center;
        }

        .destendance {
            display: none;
        }

        #closemobile {
            display: block !important;
            position: relative;
            width: 100%;
        }

        #closemobile .header__btn {
            position: absolute;
            top: -2px;
            right: -14px;
            padding: 5px;
            border-radius: 50%;
            background: #ffd80e;
            font-weight: 600;
            font-size: 15px;
            height: 30px;
            width: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .propos,
        .footer__content {
            display: none;
        }

        .propostablette {
            display: block !important;
        }

        .firstabout {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            font-size: 13px;
        }

        .firstabout h3 a {
            text-decoration: underline;
            color: #fff;
            font-size: 13px;
        }

        .firstabout .logo .text {
            font-size: 1.6rem !important;
        }

        .firstabout .form-select {
            width: 140px;
            height: 30px;
            padding: 1px;
        }

        .secondabout {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: flex-start;
            justify-content: space-between;
            font-size: 13px;
        }

        .secondabout .mediaa {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .secondabout .lesSociaux {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .footer__contentTablette {
            text-align: center;
        }

        .thirtyabout h3 a {
            text-decoration: underline;
            color: #fff;
            font-size: 13px;
        }

        .secondabout a {
            text-decoration: underline;
        }

        .thirtyabout {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: space-between;
            font-size: 13px;
        }

        .thirtyabout .mediaa {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
        }


        .thirtyabout .mediaa .lesSociaux {
            display: flex;
            flex-direction: row;
        }

        .thirtyabout h3 img {
            width: 130px;
            height: 50px;
        }

        .footer__back {
            z-index: 99;
        }
    }

    @media only screen and (max-width: 767px) {
        .logo .icon {
            width: 25px !important;
            height: 25px !important;
        }


        #sugggestitlte {
            font-size: 1.6rem;
        }

        .logo .text {
            font-size: 1.2rem !important;
        }

        .home {
            height: 380px !important;
        }

        .home div .container {
            margin-top: 100px !important;
            display: flex;
            align-content: center;
            justify-content: center;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
        }

        .subscriptHome h1 {
            margin-top: 150px !important;
        }

        .plan-features li {
            font-size: 14px !important;
        }

        .price__item {
            font-size: 14px !important;
        }

        .propos,
        .footer__contentTablette,
        .propostablette {
            display: none;
        }

        .firstabout {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: flex-start;
            font-size: 13px;
        }

        .firstabout .logo .text {
            font-size: 1.6rem !important;
        }

        .firstabout .form-select {
            width: 140px;
            height: 30px;
            padding: 1px;
        }

        .secondabout {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: flex-start;
            justify-content: space-between;
            font-size: 12px;
        }

        .secondabout a {
            text-decoration: underline;
        }

        .thirtyabout {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: space-between;
            font-size: 12px;
        }

        .thirtyabout .mediaa {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
        }

        .thirtyabout .mediaa .lesSociaux {
            display: flex;
            flex-direction: row;
        }

        .thirtyabout h3 img {
            width: 130px;
            height: 50px;
        }

        .sectionbottom {
            padding-bottom: 0;
        }

        .footer__content {
            display: none;
        }

        .footer__contentMobile {
            padding: 0;
            text-align: center;
        }

        .footer__contentMobile .footer__nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            align-content: center;
            justify-content: center;
            font-size: 12px;
        }

        .footer__contentMobile .footer__nav a {
            text-decoration: underline;
        }

        .footer__back {
            right: 10px;
            z-index: 99;
        }

        #closemobile {
            position: relative;
            width: 100%;
        }

        #closemobile .header__btn {
            position: absolute;
            top: -2px;
            right: -14px;
            padding: 5px;
            border-radius: 50%;
            background: #ffd80e;
            font-weight: 600;
            font-size: 15px;
            height: 30px;
            width: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card__cover {
            width: 130px;
            height: 180px;
        }

        .card__content .d-flex {
            display: flex !important;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: baseline;
            width: 130px;
            align-content: center;
        }

        .Animons {
            height: 75px;
        }

        .home div .h3 {
            font-size: 16px !important;
            margin: 20px !important;
        }

        .destendance {
            display: none;
        }

        .clickmeinfos {
            display: flex;
            justify-content: center;
            flex-direction: column-reverse;
            flex-wrap: wrap;
            align-content: center;
            align-items: center;
            margin-top: 20px !important;
        }

        .home div .look {
            color: black;
            background-color: white;
            width: 200px !important;
            border: 2px solid white;
            border-radius: 30px;
            padding: 5px 5px 5px 5px !important;
            gap: 12px !important;
            font-family: Abel;
            font-size: 14px !important;
        }

        .home div .info {
            color: white;
            background-color: transparent;
            width: 120px !important;
            border: 2px solid white;
            border-radius: 30px;
            padding: 5px 5px 5px 5px !important;
            gap: 12px;
            font-family: Abel;
            font-size: 14px !important;
        }
    }

    @media only screen and (width: 320px) {
        .firstabout {
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-size: 13px;
            align-content: center;
            align-items: center;
        }

        .secondabout {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;
            font-size: 12px;
            align-content: center;
        }

        .thirtyabout {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
        }
    }

    @media only screen and (max-width: 768px) {
        .header__nav-link {
            color: #fff;
        }
    }

    @media only screen and (width: 1024px) {
        .header__nav-link {
            color: #000;
        }
    }

    @media (max-width: 768px) {

        .proposMobile,
        .footer__contentMobile,
        #closemobile,
        .propostablette {
            display: none;
        }

        .home div .container {
            margin-top: 220px !important;
        }

        .home div .look {
            color: black;
            background-color: white;
            width: 200px !important;
            border: 2px solid white;
            border-radius: 30px;
            padding: 10px 10px 10px 10px;
            gap: 12px !important;
            font-family: Abel;
            font-size: 15px;
        }

        .home div .info {
            color: white;
            background-color: transparent;
            width: 161px !important;
            border: 2px solid white;
            border-radius: 30px;
            padding: 10px 10px 10px 10px;
            gap: 12px;
            font-family: Abel;
            font-size: 15px;
        }
    }
</style>
<!-- end header -->
