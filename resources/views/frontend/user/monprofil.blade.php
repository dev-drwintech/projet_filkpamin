<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Mon espace personnel
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}" sizes="125x125">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css') }}">
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="drwintech.com" src=""></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <h3 class="text-center">Bienvenue {{ $user->name }}</h3>
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
        </div>
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('frontend.user.dashboard', $user->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Espace personnel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('home', auth()->id()) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" Mes abonnements
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Accueil</span>
                    </a>
                </li>

                @if (auth()->user()->role->nom == 'partenaire')
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('frontend.partenaire.dashboard', auth()->user()->id) }}">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>office</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g id="office" transform="translate(153.000000, 2.000000)">
                                                    <path class="color-background opacity-6"
                                                        d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                    </path>
                                                    <path class="color-background"
                                                        d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Gestion partenaire</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role->nom == 'admin')
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('admin') }}">
                            <div
                                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>office</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g id="office" transform="translate(153.000000, 2.000000)">
                                                    <path class="color-background opacity-6"
                                                        d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                    </path>
                                                    <path class="color-background"
                                                        d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Gestion admin</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active " href="{{ route('frontend.user.monprofil', $user->id) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1"> Mon profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('frontend.user.abonnement') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Abonnments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="javascript:void()"
                        onclick="document.getElementById('logout-form').submit();">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Déconnecter</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true" style="z-index: 999">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-lg mb-0">Mon profil personnel</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        @if (session('message'))
            <div class="alert alert-{{ session('type', 'info') }} d-flex align-items-center" role="alert">
                @if (session('type') === 'success')
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                @else
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                @endif
                <div>
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="container-fluid py-4">
            <div class="row">
                <!-- Profil Utilisateur -->
                <div class="col-lg-6 col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>PROFIL DE L'UTILISATEUR</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('frontend.users.update', auth()->user()->id) }}"
                                class="profile__form" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row g-3">
                                    <div class="col-md-12" style="width:100% !important;">
                                        <label for="name">Nom</label><br>
                                        <input id="name" type="text" name="name" class="profile__input"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="col-md-12" style="width:100% !important;">
                                        <label for="email">Email</label><br>
                                        <input id="email" type="email" name="email" class="profile__input"
                                            value="{{ $user->email }}">
                                    </div>
                                    <div class="col-md-12" style="width:100% !important;">
                                        <label for="provider_id">ID FOURNIS</label><br>
                                        <input id="provider_id" type="text" class="profile__input"
                                            placeholder="si vous vous êtes connecté avec un compte social, cela lui apparaîtra ici."
                                            value="{{ $user->provider_id }}" disabled>
                                    </div>
                                    @if ($user->id == auth()->user()->id)
                                        <div class="col-12 mt-2">
                                            <button class="profile__btn" type="submit">Mettre à jour</button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>MODIFICATION DU MOT DE PASSE</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('frontend.users.update', auth()->user()->id) }}"
                                class="profile__form" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="old_password">Ancien mot de passe</label><br>
                                        <input id="old_password" type="password" name="old_password"
                                            class="profile__input">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="password">Nouveau mot de passe</label><br>
                                        <input id="password" type="password" name="password"
                                            class="profile__input">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="password_confirmation">Confirmation mot de passe</label><br>
                                        <input id="password_confirmation" type="password"
                                            name="password_confirmation" class="profile__input">
                                    </div>
                                    @if ($user->id == auth()->user()->id)
                                        <div class="col-12 mt-2">
                                            <button class="profile__btn" type="submit">Modifier</button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- ----------------------------------Integration 2FA  ------------------------------- --}}

                <div class="container-2fa">
                    <div class="col-lg-12 col-md-8 mb-4">
                        <div class="card shadow-none">
                            <div class="card-header">
                                <h5>AUTHENTIFICATION À DEUX FACTEURS (2FA)</h5>
                            </div>
                            <div class="card-body" style="padding-bottom: 0">
                                <div class="d-flex flex-column flex-lg-row">

                                    <!-- Ligne verticale et cercles cachés sur les écrans de petite taille -->
                                    <div class="step-line d-none d-lg-block" style="position: relative; width: 50px;">
                                        <div
                                            style="position: absolute; top: 47px; bottom: 150px; left: 50%; border-left: 2px solid #ccc;">
                                        </div>
                                        <div class="circle-1"
                                            style="position: relative; width: 20px; height: 20px; border-radius: 50%; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%); margin: 60% auto; text-align: center; line-height: 20px; color: #fff; font-weight: bold;">
                                            1</div>
                                        <div class="circle-2"
                                            style="position: relative; width: 20px; height: 20px; border-radius: 50%; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%); margin: 730% auto; text-align: center; line-height: 20px; color: #fff; font-weight: bold;">
                                            2</div>
                                        <div class="circle-3"
                                            style="position: relative; width: 20px; height: 20px; border-radius: 50%; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%); margin: 480% auto; text-align: center; line-height: 20px; color: #fff; font-weight: bold;">
                                            3</div>
                                    </div>

                                    <!-- Contenu des étapes -->
                                    <div class="container-step">

                                        <style>
                                            /* Conteneur pour le tooltip */
                                            .tooltip-content {
                                                position: absolute;
                                                top: 140%;
                                                left: 50%;
                                                transform: translateX(-50%);
                                                background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);
                                                padding: 5px;
                                                border-radius: 5px;
                                                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                                                display: none;
                                                z-index: 1000;
                                            }

                                            .tooltip-content::after {
                                                content: '';
                                                position: absolute;
                                                top: -25px;
                                                left: 50%;
                                                transform: translateX(-50%);
                                                border-width: 10px;
                                                border-style: solid;
                                                border-color: transparent transparent #eeb500 transparent;
                                            }

                                            /* Affiche le tooltip au survol */
                                            .btn-tooltip:hover .tooltip-content {
                                                display: block;
                                            }

                                            /* Style pour flouter QR CODE de google */
                                            .blurred {
                                                filter: blur(4px);
                                            }

                                            /* Style des boutons sans animation */
                                            #copyKeyBtn,
                                            .btn-store {
                                                border: none;
                                                cursor: pointer;
                                                color: gray;
                                                padding: 0 8px 0 0;
                                                transition: none !important;
                                                transform: none !important;
                                            }

                                            #copyKeyBtn:hover,
                                            .btn-store:hover {
                                                color: #ff5a19;
                                            }

                                            #copyKeyBtn:focus,
                                            .btn-store:focus {
                                                outline: none;
                                            }

                                            #copyKeyBtn i {
                                                font-size: 15px;
                                                transition: none !important;
                                                transform: none !important;
                                            }

                                            .notification {
                                                position: fixed;
                                                top: 10%;
                                                left: 50%;
                                                transform: translate(-50%, -50%);
                                                background-color: #d4edda;
                                                color: green;
                                                padding: 10px 20px;
                                                border-radius: 5px;
                                                font-size: 16px;
                                                display: none;
                                                z-index: 9999;
                                                opacity: 0;
                                                transition: opacity 0.3s ease;
                                            }

                                            .notification.error {
                                                background-color: #f8d7da;
                                                color: #c82333;
                                            }

                                            .notification.show {
                                                display: block;
                                                opacity: 1;
                                            }

                                            .notification.hide {
                                                opacity: 0;
                                            }

                                            /* Responsive pour masquer les cercles et la ligne sur les petits écrans */
                                            @media (max-width: 991px) {
                                                .step-line {
                                                    display: none;
                                                }

                                                .align-vertical {
                                                    flex-direction: column;
                                                }

                                                .notification {
                                                    font-size: 8px;
                                                }

                                                .btn-taille {
                                                    width: 50% !important;
                                                }

                                                .input-taille {
                                                    /* width: ; */
                                                }
                                            }
                                        </style>

                                        <!-- Étape 1 -->
                                        <h6 class="mt-4" style="color: black !important; font-weight: bold;">
                                            1ère étape : Installez Google Authenticator sur votre smartphone.
                                        </h6>
                                        <div class="d-flex  align-vertical" style="">
                                            <div class=" d-flex align-items-center alignement-1 me-5 mt-3">
                                                <!-- Bouton App Store -->
                                                <a href="https://apps.apple.com/us/app/google-authenticator/id388497605"
                                                    target="_blank" class="btn btn-outline-primary btn-store me-2"
                                                    style="padding-right:0">
                                                    <img src="{{ asset('icon/images-app-store.png') }}"
                                                        alt="App Store logo" style="width:150px; height:50px;">
                                                </a>

                                                <!-- Premier bouton QR Code -->
                                                <div class="btn btn-primary btn-tooltip qr-code-btn" id="qrBtn1"
                                                    style=" margin-right:20px ; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);">
                                                    <i class="fa-solid fa-qrcode"
                                                        style="color:black; font-size: 2rem; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;"></i>
                                                    <div class="tooltip-content">
                                                        <img src="{{ asset('icon/qr-code-for-app-strore.png') }}"
                                                            alt="QR Code 1" class="qr-code-img"
                                                            style="max-width: 100px">
                                                        <p class="tooltip-text" style="font-size: 8px; margin:0">
                                                            Scannez pour télécharger</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" d-flex align-items-center  alignement-2  me-5 mt-3">
                                                <!-- Bouton Google Play -->
                                                <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"
                                                    target="_blank" class="btn btn-outline-primary btn-store ">
                                                    <img src="{{ asset('icon/Google_Play_Store.png') }}"
                                                        alt="Play Store logo" style="width:150px; height:50px;">
                                                </a>

                                                <!-- Deuxième bouton QR Code -->
                                                <div class="btn btn-primary btn-tooltip qr-code-btn" id="qrBtn2"
                                                    style="display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);">
                                                    <i class="fa-solid fa-qrcode"
                                                        style="color:black; font-size: 2rem; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;"></i>
                                                    <div class="tooltip-content">
                                                        <img src="{{ asset('icon/qr-code-for-play-strore.png') }}"
                                                            alt="QR Code 2" class="qr-code-img"
                                                            style="max-width: 100px">
                                                        <p class="tooltip-text" style="font-size: 8px; margin:0">
                                                            Scannez pour télécharger</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Authentication (2FA) -->
                                        <div class="col-lg-12 col-md-8 mb-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>AUTHENTIFICATION A DEUX FACTEURS</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p style="color: black;">Protégez votre compte avec une couche de
                                                        sécurité supplémentaire.
                                                        Activez l'authentification à deux facteurs pour protéger votre
                                                        compte contre les accès non autorisés.</p>

                                                    <div id="auth-app-instructions" class="mt-3">
                                                        <p style="color: black;">
                                                            Avant de continuer, veuillez télécharger une application
                                                            d'authentification telle que
                                                            <strong>Google Authenticator</strong> ou <strong>Microsoft
                                                                Authenticator</strong>.
                                                        </p>
                                                    </div><br><br><br><br>

                                                    <!-- Bouton pour activer 2FA -->
                                                    <div id="activate-2fa-btn-container" class="col-12 mt-2">
                                                        <button id="activate-2fa-btn" class="profile__btn"
                                                            type="button" data-bs-toggle="tooltip"
                                                            data-bs-placement="right">Activer</button>
                                                    </div>
                                                    <h6 class="mt"
                                                        style="color: black !important; font-weight: bold; margin-top:50px">
                                                        2e étape : Configurez Google Authenticator.
                                                    </h6>
                                                    <div class="mb-4">
                                                        <p style="font-size: 14px">Remarque : Conservez soigneusement
                                                            la clé
                                                            vérification Google.</p>
                                                        <span
                                                            style="padding: 10px; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%); display: inline-block; border-radius: 10px;">
                                                            <img src="data:image/svg+xml;base64,{{ base64_encode($QR_Image) }}"
                                                                alt="QR Code" style="max-width: 100px;"
                                                                id="qrImage">
                                                        </span>


                                                        <div>
                                                            <p style="" class="d-flex">
                                                                Clé:&nbsp <strong style="color: #ff5a19"
                                                                    id="secretKey">{{ $secretKey }}</strong>&nbsp
                                                                &nbsp
                                                                <button id="copyKeyBtn"
                                                                    class="btn btn-outline-secondary btn-sm pt-1"
                                                                    title="Copier la clé">
                                                                    <i class="fa fa-clone "></i>
                                                                </button>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- Étape 3 -->
                                                    <h6 class="mt-4 margin-decalage"
                                                        style="color: black !important; font-weight: bold; margin-top:70px">
                                                        3e étape : Saisissez le code dynamique à 6 chiffres à partir de
                                                        Google
                                                        Authenticator :
                                                    </h6>
                                                    <small>Dans Google Authenticator, cliquez sur + pour ajouter un
                                                        nouveau
                                                        compte. Vous pouvez scanner le code QR ou saisir la clé fournie
                                                        pour
                                                        ajouter votre compte sur Google Authenticator.</small>

                                                    {{-- Vérifier si la 2FA est activée --}}
                                                    @if ($user->auth)
                                                        {{-- Si la 2FA est activée, afficher le bouton pour désactiver la 2FA --}}
                                                        <form action="{{ route('2fa.disable') }}" method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger ripple-btn mt-5"
                                                                style="font-weight: 600">Désactiver la 2FA</button>
                                                        </form>
                                                        {{-- Style pour animé le boutton --}}
                                                        <style>
                                                            /* Style général du bouton */
                                                            .ripple-btn {
                                                                position: relative;
                                                                overflow: hidden;
                                                                padding: 0.5em 1em;
                                                                font-size: 1em;
                                                                border: none;
                                                                border-radius: 0.375em;
                                                                cursor: pointer;
                                                                z-index: 1;
                                                                color: white;
                                                                background: linear-gradient(45deg, #e74c3c, #e67e22, #fd6716, #27ae60, #2980b9, #9b59b6);
                                                                background-size: 400% 400%;
                                                                animation: gradient-shift 4s ease infinite;
                                                            }

                                                            /* Animation pour le dégradé */
                                                            @keyframes gradient-shift {
                                                                0% {
                                                                    background-position: 0% 50%;
                                                                }

                                                                50% {
                                                                    background-position: 100% 50%;
                                                                }

                                                                100% {
                                                                    background-position: 0% 50%;
                                                                }
                                                            }

                                                            /* Effet de vague */
                                                            .ripple-btn::after {
                                                                content: "";
                                                                position: absolute;
                                                                border-radius: 50%;
                                                                transform: scale(0);
                                                                animation: ripple-effect 0.6s ease-out;
                                                                background-color: rgba(255, 255, 255, 0.6);
                                                                pointer-events: none;
                                                                z-index: 0;
                                                            }

                                                            @keyframes ripple-effect {
                                                                to {
                                                                    transform: scale(4);
                                                                    opacity: 0;
                                                                }
                                                            }
                                                        </style>
                                                    @else
                                                        {{-- Si la 2FA n'est pas activée, afficher le formulaire pour l'activer --}}
                                                        <form method="POST" action="{{ route('2fa.enable') }}">
                                                            @csrf
                                                            <label for="google-auth-code" class="form-label me-3">Code
                                                                d'authentification Google</label>
                                                            <div class="mb-3 d-flex align-items-center">
                                                                <input type="text" id="google-auth-code"
                                                                    name="google_auth_code" style="width:7%"
                                                                    class="form-control w-50 me-3 input-taille"
                                                                    placeholder="Code à 6 chiffres" required
                                                                    maxlength="6" pattern="\d{6}"
                                                                    title="Le code doit être composé de 6 chiffres.">
                                                                <input type="hidden" name="secret_key"
                                                                    value="{{ $secretKey }}">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-taille"
                                                                    style="width:9%; margin-bottom: 0; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%); border: none;">
                                                                    ACTIVER
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                    <script>
                                                        // Optionnel : Ajouter une validation JavaScript pour éviter que l'utilisateur entre autre chose que des chiffres
                                                        document.getElementById('google-auth-code').addEventListener('input', function(e) {
                                                            let value = e.target.value;
                                                            // Supprimer tout caractère non numérique
                                                            e.target.value = value.replace(/\D/g, '');
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notification qui s'affiche quand on copie la clé secrète-->
                                <div id="notification" class="notification"> Clé copiée avec succès !</div>

                                <script>
                                    // Sélectionner les boutons QR Code et leurs tooltips
                                    const qrBtns = document.querySelectorAll('.qr-code-btn');

                                    qrBtns.forEach(btn => {
                                        const tooltip = btn.querySelector('.tooltip-content');
                                        const qrImage = document.getElementById('qrImage'); // Le QR code de Google Authenticator

                                        // Quand la souris entre dans le tooltip
                                        btn.addEventListener('mouseenter', () => {
                                            tooltip.style.display = 'block'; // Affiche le tooltip
                                            qrImage.classList.add('blurred'); // Applique le flou au QR code
                                        });

                                        // Quand la souris quitte le tooltip
                                        btn.addEventListener('mouseleave', () => {
                                            tooltip.style.display = 'none'; // Cache le tooltip
                                            qrImage.classList.remove('blurred'); // Supprime le flou du QR code
                                        });
                                    });

                                    function showNotification(message, type = 'success', duration = 5000) {
                                        // Créer un élément de notification unique si nécessaire
                                        let notification = document.getElementById('globalNotification');
                                        if (!notification) {
                                            notification = document.createElement('div');
                                            notification.id = 'globalNotification';
                                            notification.className = 'notification';
                                            document.body.appendChild(notification);
                                        }

                                        // Définir le message et le type
                                        notification.innerHTML = message;
                                        notification.className = `notification ${type === 'error' ? 'error' : ''}`;

                                        // Afficher la notification
                                        notification.classList.add('show');

                                        // Masquer après la durée spécifiée
                                        setTimeout(() => {
                                            notification.classList.remove('show');
                                            notification.classList.add('hide');

                                            // Réinitialiser après la transition
                                            setTimeout(() => {
                                                notification.classList.remove('hide');
                                            }, 300);
                                        }, duration);
                                    }

                                    // Gestion de la copie de clé
                                    document.getElementById('copyKeyBtn').addEventListener('click', function() {
                                        const secretKey = document.getElementById('secretKey').innerText;
                                        navigator.clipboard.writeText(secretKey)
                                            .then(() => {
                                                showNotification('Clé copiée avec succès ! <i class="fa fa-check-circle"></i>');
                                            })
                                            .catch(err => {
                                                showNotification('Erreur lors de la copie. <i class="fa fa-exclamation-circle"></i>',
                                                    'error');
                                                console.error('Erreur lors de la copie : ', err);
                                            });
                                    });

                                    // Gestion des notifications de session
                                    document.addEventListener('DOMContentLoaded', function() {
                                        @if (session('error'))
                                            showNotification('{{ session('error') }}', 'error');
                                        @endif

                                        @if (session('success'))
                                            showNotification('{{ session('success') }}', 'success');
                                        @endif
                                    });
                                </script>
                            </div>

                            {{-- ----------------------------------Fin Integration 2FA ------------------------------- --}}

                        </div>
                    </div>
                    @include('frontend.user.Footer')
                </div>
    </main>
    {{-- preloder --}}
    <div id="preloader">
        <div class="spinner">
            <div class="filmstrip"></div>
            <div class="filmstrip"></div>
            <div class="filmstrip"></div>
            <div class="circle"></div>
        </div>
        <p>Chargement...</p>
    </div>
    <style>
        body {
            background-color: #ffffff;
            /* Fond blanc pour un look propre */
            font-family: Arial, sans-serif;
        }

        .btn-close {
            background-color: #6c757d;
            border: none;
            opacity: 0.4;
        }

        .btn-close-secondary:hover {
            opacity: 1;
        }

        .btn-danger {
            margin-top: 30px;
            padding: 15px;
            margin-left: 500px;
        }

        .container-fluid {
            padding: 20px;
        }

        .img {
            width: 150px;
            height: 150px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        h5 {
            color: white !important;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            /* Espacement entre les éléments de la grille */
        }

        .card {
            border: none;
            border-radius: 10px;
            /* Coins arrondis plus marqués */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            /* Ombre plus douce */
            overflow: hidden;
            /* Pour garder les coins arrondis */
            height: auto;
        }

        .card-header {
            background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);

            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            /* Coins arrondis en haut */
            text-align: center;
            /* Centrer le texte */
        }

        .card-body {
            background-color: #f5f5f5;
            /* Fond gris clair pour le contenu */
            padding: 20px;
            height: 100%;
        }

        .card-footer {
            background-color: #ffffff;
            /* Fond blanc */
            padding: 10px;
            text-align: center;
            /* Centrer le texte */
        }

        .profile__btn {
            background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            width: auto;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btno {
            background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .profile__btn:hover {
            background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);
        }

        .icon {
            display: flex;
        }
    </style>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}"></script>

    <script>
        // Preloder 
        document.addEventListener('DOMContentLoaded', function() {
            window.onload = function() {
                document.getElementById('preloader').style.display = 'none';
            };
        });

        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bouton "Activer 2FA"
            const activateButtonContainer = document.getElementById('activate-2fa-btn-container');
            const activateButton = document.getElementById('activate-2fa-btn');
            // Bouton "Copier"
            const copyKeyButton = document.getElementById('copy-key-btn');
            const keyInput = document.getElementById('key');

            // Section QR Code et Clé secrète
            const twoFaSection = document.getElementById('section');

            // Ajout de l'événement clic
            activateButton.addEventListener('click', function() {
                // Masquer le bouton "Activer 2FA"
                activateButtonContainer.classList.add('d-none');

                // Afficher la section QR Code et Clé secrète
                twoFaSection.classList.remove('d-none');
            });

            // Ajout de l'événement clic pour "Copier"
            copyKeyButton.addEventListener('click', function() {
                // Copier la valeur de la clé dans le presse-papiers
                navigator.clipboard.writeText(keyInput.value).then(function() {
                    // Changer le texte du bouton pour indiquer que la clé a été copiée
                    copyKeyButton.textContent = "Copié ";
                    setTimeout(() => {
                        copyKeyButton.textContent = "Copier";
                    }, 2000); // Réinitialiser après 2 secondes
                }).catch(function(err) {
                    console.error('Erreur lors de la copie :', err);
                });
            });
        });
    </script>

</body>

</html>
