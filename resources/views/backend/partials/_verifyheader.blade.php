<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <!-- header logo -->
                    <a href="/" class="header__logo">
                        logo
                    </a>
                    <!-- end header logo -->

                    <!-- header nav -->
                    <ul class="header__nav">
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
                            <a href="{{ route('frontend.subscriptions.index') }}"
                                class="header__nav-link">Abonnements</a>
                        </li>
                    </ul>
                    <!-- end header nav -->

                    <!-- header auth -->
                    <div class="header__auth">
                        <form action="{{ route('frontend.search.index') }}" class="header__search">
                            <input class="header__search-input" type="text" name="q"
                                placeholder="Rechercher Films, Séries..."
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

                        {{--                        <a href="{{ route('frontend.notifications.index') }}" style="font-size: 32px; margin: 0 10px 0 18px;"><i class="icon ion-ios-notifications"></i><span class="badge badge-light">@auth {{ auth()->user()->unreadNotifications->count() }} @endauth</span></a> --}}
                        @auth
                         {{--    <button type="button" class="btn btn-primary btn-sm d-none d-md-block ml-2"
                                onclick="window.location.href='{{ route('frontend.notifications.index') }}'">
                                <i class="icon ion-ios-notifications px-1" style="font-size: 20px;"></i>
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </button>--}}
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="header__sign-in">
                                <i class="icon ion-ios-log-in"></i>
                                <span>Se connecter</span>
                            </a>
                        @else
                            <div class="dropdown ml-2 avatarmenu">
                                <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}"
                                            style="border: 2px solid yellow; border-radius: 50%; width: auto; height: 40px;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                            alt="{{ auth()->user()->name }}"
                                            style="border: 2px solid yellow; border-radius: 50%; width: auto; height: 40px;">
                                    @endif
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('frontend.users.show', auth()->id()) }}">
                                        <i class="icon ion-ios-person" style="margin-right: 5px"></i>
                                        Mon espace personnel
                                    </a>
                                    @if (auth()->user()->role->nom == 'admin' || auth()->user()->role->nom == 'partenaire')
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                            <i class="icon ion-ios-home" style="margin-right: 5px"></i>Tableaux de Bord
                                        </a>
                    
                                    @endif
                                    <a class="dropdown-item" href="{{ route('frontend.notifications.index') }}"
                                        style="display: flex; align-items: center">
                                        <i class="icon ion-ios-notifications" style="margin-right: 5px"></i> Notifications
                                        @if (auth()->user()->unreadNotifications->count() > 0)
                                            <span
                                                class="badge badge-dark ml-2">{{ auth()->user()->unreadNotifications->count() }}
                                            </span>
                                        @endif
                                    </a>
                                    <a class="dropdown-item" href="{{ route('frontend.users.show', auth()->id()) }}"
                                        style="display: flex; align-items: center">
                                        <i class="icon ion-ios-settings" style="margin-right: 5px"></i> Paramètre
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon ion-ios-log-out" style="margin-right: 5px"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <!-- end header auth -->
                        @endguest

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
<!-- end header -->
