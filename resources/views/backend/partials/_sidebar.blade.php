<!-- sidebar -->
<div class="sidebar">
    <!-- sidebar logo -->
    <a href="{{ route('home') }}" class="sidebar__logo">
        <img src="{{ asset('../assets/img/logo.png') }}" alt="">
    </a>
    <!-- end sidebar logo -->

    <!-- sidebar user -->
    <div class="sidebar__user">
        <div class="sidebar__user-img">
            @if (auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}"
                    style="border: 1px solid #CCCCCC; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;">
            @endif

        </div>

        <div class="sidebar__user-title">
            <p>{{ auth()->user()->name }}</p>
        </div>

        <a href="{{ route('logout') }}" class="sidebar__user-btn" type="button"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="icon ion-ios-log-out"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <!-- end sidebar user -->

    <!-- sidebar nav -->
    <ul class="sidebar__nav">
        <li class="sidebar__nav-item">
            <a href="{{ route('admin') }}"
                class="sidebar__nav-link {{ request()->routeIs('admin') ? 'sidebar__nav-link--active' : '' }}"><i
                    class="icon ion-ios-keypad"></i>Tableau de Bord</a>
        </li>
        <li class="sidebar__nav-item">
            <a href="{{ route('frontend.user.dashboard', auth()->id()) }}" class="sidebar__nav-link"><i
                    class="icon ion-ios-home"></i>
                profile </a>
        </li>
        <li class="sidebar__nav-item">
            <a href="{{ route('videos.index') }}"
                class="sidebar__nav-link {{ request()->routeIs('videos.*') ? 'sidebar__nav-link--active' : '' }}"><i
                    class="icon ion-ios-film"></i> Catalogues des vidéos</a>
        </li>
        @if (auth()->user()->role->nom === 'admin')
            <li class="sidebar__nav-item">
                <a href="{{ route('users.index') }}"
                    class="sidebar__nav-link {{ request()->routeIs('users.*') ? 'sidebar__nav-link--active' : '' }}"><i
                        class="icon ion-ios-contacts"></i>Utilisateurs</a>
            </li>
        @endif

        <li class="sidebar__nav-item">
            <a href="{{ route('comments.index') }}"
                class="sidebar__nav-link {{ request()->routeIs('comments.*') ? 'sidebar__nav-link--active' : '' }}"><i
                    class="icon ion-ios-chatbubbles"></i>Commentaires</a>
        </li>

        <li class="sidebar__nav-item">
            <a href="{{ route('reviews.index') }}"
                class="sidebar__nav-link {{ request()->routeIs('reviews.*') ? 'sidebar__nav-link--active' : '' }}"><i
                    class="icon ion-ios-star-half"></i> Avis</a>
        </li>

        <!-- dropdown -->
        <li class="dropdown sidebar__nav-item">
            <a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownMenuMore"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-film"></i>
                VIDEOS</a>

            <ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore"
                style="background-color: #1a191f; padding:10px;">
                <li><a href="{{ route('videos.create') }}">Ajouter une vidéo/série</a></li>
                <li><a href="{{ route('videos_category.index') }}">Catégorie vidéo</a></li>
                <li><a href="{{ route('videos_en_attente.index') }}">Vidéo en attente</a></li>
            </ul>
        </li>
        <!-- end dropdown -->

        <li class="sidebar__nav-item">
            <a href="{{ route('demande_de_paiement.index') }}"
                class="sidebar__nav-link {{ request()->routeIs('demande_de_paiement.*') ? 'sidebar__nav-link--active' : '' }}"><i
                    class="icon ion-ios-contacts"></i>Demande de paiement</a>
        </li>
    </ul>
    <!-- end sidebar nav -->

    <!-- sidebar copyright -->
    <div class="sidebar__copyright">© 2024 {{ config('app.name') }}. <br>Crée par <a href="#"
            target="_blank">DRWINTECH</a></div>
    <!-- end sidebar copyright -->
</div>
<!-- end sidebar -->
