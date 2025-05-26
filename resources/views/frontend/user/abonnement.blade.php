<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Mon Abonnement
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css') }}">
</head>

<body class="g-sidenav-show bg-gray-100">
    <!-- Alert infos -->
    <div class="alert-dismissible fade show animate__animated animate__fadeInRight" role="alert"
        id="alertNonconected">
        <div>
            Vous devez être connecté pour effectuer un paiement.
            <br>
            <a href="{{ route('login') }}" class=" offset-md-5 -text-center">Se connecter</a>
        </div>
    </div>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <h3 class="text-center">Bienvenue {{ auth()->user()->name }}</h3>
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
        </div>
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('frontend.user.dashboard', auth()->id()) }}">
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
                        <span class="nav-link-text ms-1">Accueil</span>
                    </a>
                </li>
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
                            <span class="nav-link-text ms-1">Gestion Admin</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role->nom == 'partenaire')
                    <li class="nav-item">
                        <a class="nav-link  "
                            href="{{ route('frontend.partenaire.dashboard', auth()->user()->id) }}">
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
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('frontend.user.monprofil', auth()->id()) }}">
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
                    <a class="nav-link  active" href="{{ route('frontend.user.abonnement') }}">
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
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder text-lg mb-0">Mes abonnements</h6>
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

        <div class="container-fluid py-4">
            @if (session('error'))
                <div class="alert alert-danger text-light alert-dismissible fade show animate__animated animate__fadeInRight"
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
            <div class="row">
                @php
                    $active = null;
                    $plan = null;
                    $amount = null;
                    $date = null;
                    $expiration = null;
                @endphp

                <!-- Vérifiez si l'utilisateur est connecté -->
                @if (auth()->check())
                    @if ($activePayments->isEmpty())
                        @php
                            $active = 'inactive';
                        @endphp
                    @else
                        @foreach ($activePayments as $payment)
                            @php
                                $active = $payment->status;
                                $plan = $payment->PlanAbonnement;
                                $amount = $payment->amount;
                                $date = $payment->created_at;
                                $expiration = $payment->expire_date;
                            @endphp
                        @endforeach
                    @endif
                @endif
                {{-- Détail abonnement en cours --}}
                <div class="col-lg-12 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="color: #fff; font-size:  1.8em;">Détails de votre abonnement</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if ($active === 'active')
                                    <div class="subscription-info">
                                        <p style="font-weight: bold;">Type de plan : <span
                                                style="font-weight: 400; color: black;">{{ $plan ?? 'Aucun abonnement actif' }}</span>
                                        </p>
                                        <p style="font-weight: bold;">Statut : <span
                                                style="font-weight: 400; color: black;">{{ $active ?? 'Inactif' }}</span>
                                        </p>
                                        <p style="font-weight: bold;">Montant : <span
                                                style="font-weight: 400; color: black;">{{ isset($amount) ? $amount . ' FCFA / mois' : '---' }}</span>
                                        </p>
                                        <p style="font-weight: bold;">Date d'abonnement : <span
                                                style="font-weight: 400; color: black;">{{ isset($date) ? $date : '---' }}</span>
                                        </p>
                                        <p style="font-weight: bold;">Date d’expiration : <span
                                                style="font-weight: 400; color: black;">{{ isset($expiration) ? $expiration : '---' }}</span>
                                        </p>
                                    </div>
                                @else
                                    <p class="text-muted text-center">Vous n’avez pas d’abonnement actif pour le
                                        moment.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Forfaits secion --}}
                <div class="content" style="margin-top: 30px;">
                    <div class="title mb-5 col text-light d-flex">
                        <p class=""><span class=""
                                style="color: #344767; font-size: 18px; font-weight: bold;">Découvrez nos
                                plans tarifaires adaptés à vos envies !</span></p>
                    </div>
                    <div class="pricing-subscrb">
                        <!-- Plan Basique -->
                        <div class="plan basic-plan">
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
                                    data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce
                                    plan</a>
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
                                    data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce
                                    plan</a>
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
                                    data-authenticated="{{ auth()->check() ? 'true' : 'false' }}">Choisissez ce
                                    plan</a>
                            @endif
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="row">
                                        <div class="col-lg-6 col-7">
                                            <h6>SUGGESTIONS DES MEILLEURS FILMS ET SÉRIES</h6>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <div class="container">
                                        <div class="rien"
                                            style="display: flex; flex-wrap: wrap; margin-left: -15px; margin-right: -15px;">
                                            <!-- carousel -->
                                            <div id="album-rotator">
                                                {{-- <div class="arrow arrow-left"><i class="fas fa-chevron-left"></i></div>
                                            <div class="arrow arrow-right"><i class="fas fa-chevron-right"></i></div> --}}
                                                <div
                                                    @if ($tablesugestvideos->isEmpty()) @else id="album-rotator-holder" @endif>
                                                    @if ($tablesugestvideos->isEmpty())
                                                        <p>Aucune vidéo Sugérées pour l'instant </p>
                                                    @else
                                                        @foreach ($tablesugestvideos as $videos)
                                                            <div class="cardd mx-4">
                                                                <div class="card__cover card_film">
                                                                    <img src="{{ asset('storage/' . $videos->photos) }}"
                                                                        alt="{{ $videos->title }}" />
                                                                    <!-- Vidéo qui sera affichée au survol -->
                                                                    <video class="card__video" muted
                                                                        preload="metadata">
                                                                        <source
                                                                            src="{{ asset('storage/' . $videos->demo) }}"
                                                                            type="video/mp4">
                                                                    </video>
                                                                    <a href="{{ route('frontend.videos.show', $videos->slug) }}"
                                                                        class="card__play">
                                                                        <i class="icon ion-ios-play"
                                                                            style="color:yellow;"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="card__content">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div>
                                                                            <span style="color: #3d3ddb">
                                                                                <i
                                                                                    class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($videos->runtime) }}
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            @if ($videos->views == 0)
                                                                            @else
                                                                                <span class=""
                                                                                    style="color: #3d3ddb !important; font-weight: 600;">
                                                                                    {{ formatNumber($videos->views) }}
                                                                                    <i
                                                                                        class="fa-regular fa-eye mx-1"></i>
                                                                                    vues
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <p class="card__title">
                                                                        <a href="{{ route('frontend.videos.show', $videos->slug) }}"
                                                                            style="color: black;">{{ $videos->title }}</a>
                                                                    </p>
                                                                    <span class="card__category" style="color: red;">
                                                                        {{ $videos->type }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="card-header pb-0">
                                    <h6> Les vidéos les plus regardés</h6>
                                    <!--<p class="text-sm">
                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                    <span class="font-weight-bold">24%</span> this month
                  </p>-->
                                </div>
                                <div class="card-body p-3">
                                    <div class="container">
                                        <div class="rien"
                                            style="display: flex; flex-wrap: wrap; margin-left: -15px; margin-right: -15px;">
                                            <!-- carousel -->
                                            <div id="album-rotator">
                                                {{-- <div class="arrow arrow-left"><i class="fas fa-chevron-left"></i></div>
                                            <div class="arrow arrow-right"><i class="fas fa-chevron-right"></i></div> --}}
                                                <div
                                                    @if ($Mieuxregardee->isEmpty()) @else id="album-rotator-holder" @endif>
                                                    @if ($Mieuxregardee->isEmpty())
                                                        <p>Aucune vidéo regardé disponible pour l'instant</p>
                                                    @else
                                                        @foreach ($Mieuxregardee as $videos)
                                                            <div class="cardd mx-4">
                                                                <div class="card__cover card_film">
                                                                    <img src="{{ asset('storage/' . $videos->photos) }}"
                                                                        alt="{{ $videos->title }}" />
                                                                    <!-- Vidéo qui sera affichée au survol -->
                                                                    <video class="card__video" muted
                                                                        preload="metadata">
                                                                        <source
                                                                            src="{{ asset('storage/' . $videos->demo) }}"
                                                                            type="video/mp4">
                                                                    </video>
                                                                    <a href="{{ route('frontend.videos.show', $videos->slug) }}"
                                                                        class="card__play">
                                                                        <i class="icon ion-ios-play"
                                                                            style="color:yellow;"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="card__content">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div>
                                                                            <span style="color: #3d3ddb">
                                                                                <i
                                                                                    class="fa-regular fa-clock mx-1"></i>{{ convertMinutesToHours($videos->runtime) }}
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            @if ($videos->views == 0)
                                                                            @else
                                                                                <span class=""
                                                                                    style="color: #3d3ddb !important; font-weight: 600;">
                                                                                    {{ formatNumber($videos->views) }}
                                                                                    <i
                                                                                        class="fa-regular fa-eye mx-1"></i>
                                                                                    vues
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <p class="card__title">
                                                                        <a href="{{ route('frontend.videos.show', $videos->slug) }}"
                                                                            style="color: black;">{{ $videos->title }}</a>
                                                                    </p>
                                                                    <span class="card__category" style="color: red;">
                                                                        {{ $videos->type }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('frontend.user.Footer')
        </div>
    </div>
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

    <style>
        #alertNonconected {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 20px;
            right: 10px;
            z-index: 999;
            display: none;
            width: fit-content;
        }

        .container-fluid {
            padding: 20px;
        }

        h5 {
            color: white !important;
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


        /** Affichage des trois plan d'abonnement */
        .pricing-subscrb {
            margin-top: 0;
            /* Par défaut */
        }

        .pricing-subscrb.show-all-plans {
            margin-top: 150px;
            /* Lorsque tous les plans sont affichés */
        }


        /* Tarifs abonnments */
        .container {
            width: 90%;
            margin: 0 auto;
            padding: 50px 0;
        }

        .forfaits .title p {
            text-align: center;
            margin-bottom: 50px;
            font-size: 48px;
            font-weight: 700;
            font-family: "Inter" sans-serif;
            line-height: 52.8px;
            color: #fff;
        }

        .forfaits {
            background: #1d1d1d;
        }

        h1:not(.questionnement, .hero-content h1) {
            font-size: 2.5em;
            color: #fff;
            margin-bottom: 20px;
            z-index: 99;
        }

        .pricing-plans {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 160px;
        }

        .pricing-subscrb {
            display: flex;
            justify-content: space-around;
            gap: 30px;
            flex-wrap: wrap;
        }

        .plan {
            background: white;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 350.55px;
            text-align: center;
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .plan:nth-child(2),
        .plan:nth-child(3) {
            padding-bottom: 100px;
        }

        .plan:nth-child(2) {
            transform: translateY(-90px);
        }

        .plan:nth-child(2):hover {
            transform: translateY(-95px);
        }

        .plan:hover:not(.plan:nth-child(2)) {
            transform: translateY(-10px);
        }

        .plan h2 {
            font-size: 1.8em;
            color: #fff;
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            height: 15vh;
            text-align: center;
            padding: 0 30px;
        }

        .basiquename {
            background: linear-gradient(132.65deg, #ff5a19 20%, #eeb500 80%);
            border-radius: 0 5% 100% 0;
        }

        .standardname {
            background: linear-gradient(132.65deg, #eeb500 30%, #ff5a19 70%);
            border-radius: 0 0 100% 100%;
        }

        .premiumname {
            background: linear-gradient(132.65deg, #ff5a19 20%, #eeb500 80%);
            border-radius: 0 0 5% 100%;
        }

        .price {
            font-size: 2em;
            font-weight: bold;
            color: #eeb500;
            background: transparent;
            box-shadow: none;
            position: relative;
            top: 90px;
            bottom: 20px;
        }

        .features {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
            margin-top: 80px;
        }

        .features li {
            margin: 10px 0;
            font-size: 1.1em;
            color: black;
            text-align: center;
        }

        .features li::before {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            background-image: url("../icon/Symbol.png");
            background-size: contain;
            background-repeat: no-repeat;
            margin-right: 10px;
            position: relative;
            top: 5px;
        }

        .plan .no-feature::before {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            background-image: url("../icon/Symbolnot.png");
            background-size: contain;
            background-repeat: no-repeat;
            margin-right: 10px;
        }

        .barreli {
            border: none;
            height: 2px;
            background-color: #54595f;
            width: 260px;
        }

        .cta {
            font-size: 1.2em;
            padding: 10px 20px;
            background: linear-gradient(99.26deg, #eeb500 0%, #ff5a19 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            width: 282.19px;
            transition: background-color 0.3s ease;
        }

        .cta:hover {
            background-color: #f58e42;
            color: #fff;
        }

        @media (max-width: 768px) {
            .pricing-plans {
                flex-direction: column;
                align-items: center;
            }

            .plan {
                width: 100%;
                max-width: 350px;
                margin-bottom: 30px;
            }
        }
    </style>
</body>

</html>
