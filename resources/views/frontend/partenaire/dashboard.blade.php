<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Partenaire/Tableau de bord
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
</head>

<body class="g-sidenav-show  bg-gray-100">
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
                    <a class="nav-link  active"
                        href="{{ route('frontend.partenaire.dashboard', auth()->user()->id) }}">
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
                        <span class="nav-link-text ms-1">Tableaux de bord</span>
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
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('frontend.user.monprofil', auth()->id()) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1"> Mon espace personnel</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('frontend.partenaire.telechargement') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Téléchargements</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('frontend.partenaire.parametre') }}">
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
                        <span class="nav-link-text ms-1">Paramètre de paiement</span>
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
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">Tableaux de bord</h6>
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

                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>

                                <span class="badge bg-danger ms-1">{{ $unreadCount }}</span>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                @if ($notifications->isEmpty())
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Aucune nouvelle notification.
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @else
                                    @foreach ($notifications as $notification)
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md">
                                                <div class="d-flex py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span
                                                                class="font-weight-bold {{ is_null($notification->read_at) ? 'notification-unread' : 'notification-read' }}">
                                                                {{ $notification->data['message'] }}
                                                            </span>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i
                                                                class="fa fa-clock me-1"></i><span>{{ $notification->created_at }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <a href="{{ route('notifications.read', $notification->id) }}">Marquer

                                                        comme lu</a>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" style="margin-top: 40px !important;">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Solde aujourd'hui</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $paiementtoday->isEmpty() ? 0 : 25 * $paiementtoday->count() }}
                                            <span class=" text-capitalize font-weight-bolder"
                                                style="color:  rgb(15, 228, 15)">XOF</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" style="margin-top: 40px !important;">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Solde total</p>
                                        <h5 class="font-weight-bolder mb-0" style="color:  rgb(15, 228, 15)">
                                            {{ $balance }}
                                            <span class="font-weight-bolder">XOF</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-fat-add text-lg opacity-10" aria-hidden="true"></i>
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" style="margin-top: 40px !important;">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Solde retiré</p>
                                        <h5 class="font-weight-bolder mb-0" style="color: rgb(255, 45, 45)">
                                            {{ $total_remove }}
                                            <span class="font-weight-bolder">XOF</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-fat-delete text-lg opacity-10" aria-hidden="true"></i>
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4" style="margin-top: 30px !important;">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" style="margin-top: 40px !important;">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Videos En ligne</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            @php
                                                // Récupère toutes les vidéos en ligne pour l'utilisateur authentifié
$onlineVideos = App\Models\Video::where('status', 1)
    ->where('user_id', auth()->user()->id)
                                                    ->get();
                                            @endphp

                                            @if ($onlineVideos->isEmpty())
                                                0
                                            @else
                                                <span class="font-weight-bolder mb-0"
                                                    style="color:  rgb(15, 228, 15)">
                                                    {{ $onlineVideos->count() }}
                                                </span>
                                            @endif


                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-button-play text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6" style="margin-top: 30px !important;">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" style="margin-top: 40px !important;">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Vidéos
                                            Télécharger</p>
                                        <h5 class="font-weight-bolder mb-0" style="color:  rgb(15, 228, 15)">
                                            {{ $videos->isEmpty() ? 0 : $videos->count() }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-cloud-download-95 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ---------------------------Formulaire de paiement ------------------------------ --}}
                <style>
                    /* Pour l'animation des bouttons icons de paiement */
                    .transform-hover {
                        transition: transform 0.3s ease-in-out;
                    }

                    .transform-hover:hover {
                        transform: scale(1.3);
                        border: 1px solid #fd6716;
                    }

                    @media (max-width:991.98px) {
                        .section-means-of-payment {
                            margin-top: 25px;
                        }
                    }

                    /* Pour afficher les notifications error et success */
                    @keyframes fadeOut {
                        0% {
                            opacity: 1;
                        }

                        99% {
                            opacity: 1;
                        }

                        100% {
                            opacity: 0;
                            display: none;
                        }
                    }

                    #notification-success {
                        text-align: center;
                        padding: 5px;
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        z-index: 1000;
                        animation: fadeOut 5s 0s forwards;
                        width: 27%;
                        word-wrap: break-word;
                        color: #155724;
                        /* Texte vert foncé pour le succès */
                    }

                    #notification-error {
                        text-align: center;
                        padding: 5px;
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        z-index: 1000;
                        animation: fadeOut 5s 0s forwards;
                        width: 27%;
                        word-wrap: break-word;
                        color: #c82333;
                        /* Texte vert foncé pour le succès */
                    }

                    /* Icônes */
                    .form_error i {
                        color: #c82333;
                        /* Rouge vif pour les icônes d'erreur */
                    }

                    #notification i {
                        color: #155724;
                        /* Vert foncé pour les icônes de succès */
                    }

                    @media (max-width: 768px) {
                        #notification {
                            width: 90%;
                            right: 5%;
                            font-size: 0.9rem;
                            padding: 10px;
                            top: 10px;
                            /* Ajuste la position verticale */
                        }
                    }

                    @media (max-width: 480px) {
                        #notification {
                            width: 95%;
                            right: 2.5%;
                            font-size: 0.8rem;
                            padding: 8px;
                            top: 5px;
                        }
                    }
                </style>

                @if (session('success'))
                    <div id="notification-success" class="alert alert-success" style="background: #d4edda;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div id="notification-error" class="alert alert-danger form_error" style="background: #f8d7da;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        {{ session('error') }}
                    </div>
                @endif


                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 section-means-of-payment"
                    style="margin-top: 30px !important;">
                    <div class="card p-1">
                        <div class="card-body" style="padding:16px ">
                            <h6> Demande de retrait </h6>
                        </div>
                        <div>
                            <!-- Container des moyens de paiement -->
                            <div class="bg-warnin" style="padding: 19px 16px">
                                <div class="d-flex justify-content-center"
                                    style="align-items:center; gap:30px; flex-wrap:wrap;">

                                    <!-- Vérifie si au moins un moyen de paiement est disponible -->
                                    @php
                                        $hasAnyPaymentMethod =
                                            $hasMobileMoney || $hasMoovMoney || $hasCeltiisCash || $hasBankTransfer;
                                    @endphp

                                    <!-- Si Mobile Money est disponible -->
                                    @if ($hasMobileMoney)
                                        <div class="transform-hover"
                                            style="display:flex; justify-content:center; margin-bottom:9px; align-items:center; border-radius:10px; width: 50px; height:50px; box-shadow:3px 3px 5px rgba(128, 128, 128, 0.492); ">
                                            <div data-bs-toggle="modal" data-bs-target="#mobileMoneyModal">
                                                <img style="width: 40px; height:40px; border-radius:10px;"
                                                    src="https://seeklogo.com/images/M/MTN-logo-459AAF9482-seeklogo.com.png"
                                                    alt="Mobile Money Logo">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Si Moov Money est disponible -->
                                    @if ($hasMoovMoney)
                                        <div class="transform-hover"
                                            style="display:flex; justify-content:center; margin-bottom:9px; align-items:center; border-radius:10px; width: 50px; height:50px; box-shadow:3px 3px 5px rgba(128, 128, 128, 0.492); ">
                                            <div data-bs-toggle="modal" data-bs-target="#moovMoneyModal">
                                                <img style="width: 40px; height:40px; border-radius:10px;"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGifrz7mE_KW1gxu72jPeoC05r8lTSCyIYrg&s"
                                                    alt="Moov Money Logo">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Si Celtiis Cash est disponible -->
                                    @if ($hasCeltiisCash)
                                        <div class="transform-hover"
                                            style="display:flex; justify-content:center;margin-bottom:9px; align-items:center; border-radius:10px; width: 50px; height:50px; box-shadow:3px 3px 5px rgba(128, 128, 128, 0.492); ">
                                            <div data-bs-toggle="modal" data-bs-target="#celtiisCashModal">
                                                <img style="width: 40px; height:40px; border-radius:10px;"
                                                    src="https://media.licdn.com/dms/image/v2/D4E0BAQHtTO1iuxkoyA/company-logo_200_200/company-logo_200_200/0/1666366806951?e=1738195200&v=beta&t=wIjO6184QoxDmhgIHRi3tH7FDFx2oIlJSb-ktf0A6SM"
                                                    alt="Celtiis Logo">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Si Virement Bancaire est disponible -->
                                    @if ($hasBankTransfer)
                                        <div class="transform-hover"
                                            style="display:flex; justify-content:center; margin-bottom:9px; align-items:center; border-radius:10px; width: 50px; height:50px; box-shadow:3px 3px 5px rgba(128, 128, 128, 0.492); ">
                                            <div data-bs-toggle="modal" data-bs-target="#banqueModal">
                                                <img style="width: 40px; height:40px; border-radius:10px;"
                                                    src="https://cdn-icons-png.freepik.com/256/11635/11635161.png?ga=GA1.1.611015373.1716337851&semt=ais_hybrid"
                                                    alt="Banque Logo">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Si aucun moyen de paiement n'est disponible -->
                                    @if (!$hasAnyPaymentMethod)
                                        <p
                                            style="text-align: center; color: red;  padding: 0 9.5px 0 9.5px; font-size:13px">
                                            Ajouter vos methodes de retrait dans le paramètre de paiement
                                        </p>
                                    @endif

                                </div>
                            </div>

                            <!-- Modals pour chaque types de methode  de retrait-->

                            @if ($parametresRetrait->isNotEmpty())
                                <style>
                                    .custom-placeholder::placeholder {
                                        color: #ff660080;
                                        font-weight: 700;
                                    }
                                </style>
                                <div class="contenaire-mobile">
                                    @foreach ($parametresRetrait as $parametre)
                                        @php
                                            $details = json_decode($parametre->details);
                                        @endphp

                                        {{-- Modale Mobile Money --}}
                                        @if ($parametre->type_de_paiement == 'Mobile Money')
                                            <div class="modal fade" id="mobileMoneyModal" tabindex="-1"
                                                aria-labelledby="mobileMoneyModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="mobileMoneyModalLabel">Retrait
                                                                Mobile Money</h6>
                                                            <span style="width:35%;">
                                                                <input
                                                                    style="height:30px; text-align: center; font-weight:800; font-size:10px; padding:0"
                                                                    type="text"
                                                                    class="form-control {{ $balance > 0 ? 'text-success' : 'text-danger' }}"
                                                                    value="{{ $balance }} XOF" disabled>
                                                            </span>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('historique_retraits.store') }}">
                                                                @csrf
                                                                <input type="hidden" name="type_de_paiement"
                                                                    value="Mobile Money">
                                                                <div class="mb-3">
                                                                    <label for="amount"
                                                                        class="col-form-label">Entrez le montant à
                                                                        retirer</label>
                                                                    <input type="number" name="amount"
                                                                        class="form-control" id="amount" required>
                                                                </div>
                                                                <fieldset disabled>
                                                                    <div
                                                                        style="text-align: center; margin-bottom:20px">
                                                                        Vos informations Mobile Money</div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Numéro du compte
                                                                            Mobile Money</label>
                                                                        <input type="text"
                                                                            class="form-control custom-placeholder"
                                                                            placeholder="(+229) {{ $details->numero_compte }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label custom-placeholder">Nom
                                                                            et Prénom</label>
                                                                        <input type="text"
                                                                            class="form-control custom-placeholder"
                                                                            placeholder="{{ $details->nom }}">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="submit"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-primary">Soumettre</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Modale Moov Money --}}
                                        @if ($parametre->type_de_paiement == 'Moov Money')
                                            <div class="modal fade" id="moovMoneyModal" tabindex="-1"
                                                aria-labelledby="moovMoneyModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="moovMoneyModalLabel">Retrait
                                                                Moov Money</h6>
                                                            <span style="width:35%;">
                                                                <input
                                                                    style="height:30px; text-align: center; font-weight:800; font-size:10px; padding:0"
                                                                    type="text"
                                                                    class="form-control {{ $balance > 0 ? 'text-success' : 'text-danger' }}"
                                                                    value="{{ $balance }} XOF" disabled>
                                                            </span>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('historique_retraits.store') }}">
                                                                @csrf
                                                                <input type="hidden" name="type_de_paiement"
                                                                    value="Moov Money">
                                                                <div class="mb-3">
                                                                    <label for="amount"
                                                                        class="col-form-label">Montant de
                                                                        retrait</label>
                                                                    <input type="number" name="amount"
                                                                        class="form-control" id="amount" required>
                                                                </div>
                                                                <fieldset disabled>
                                                                    <div
                                                                        style="text-align: center; margin-bottom:20px">
                                                                        Vos informations Moov Money</div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Numéro du compte Moov
                                                                            Money</label>
                                                                        <input type="text"
                                                                            class="form-control custom-placeholder"
                                                                            placeholder="(+229) {{ $details->numero_compte }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nom et Prénom</label>
                                                                        <input type="text"
                                                                            class="form-control custom-placeholder"
                                                                            placeholder="{{ $details->nom }}">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="submit"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-primary">Soumettre</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Modale Celtiis Cash --}}
                                        @if ($parametre->type_de_paiement == 'Celtiis Cash')
                                            <div class="modal fade" id="celtiisCashModal" tabindex="-1"
                                                aria-labelledby="celtiisCashModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="celtiisCashModalLabel">Retrait
                                                                Celtiis Cash</h6>
                                                            <span style="width:35%;">
                                                                <input
                                                                    style="height:30px; text-align: center; font-weight:800; font-size:10px; padding:0"
                                                                    type="text"
                                                                    class="form-control {{ $balance > 0 ? 'text-success' : 'text-danger' }}"
                                                                    value="{{ $balance }} XOF" disabled>
                                                            </span>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('historique_retraits.store') }}">
                                                                @csrf
                                                                <input type="hidden" name="type_de_paiement"
                                                                    value="Celtiis Cash">
                                                                <div class="mb-3">
                                                                    <label for="amount"
                                                                        class="col-form-label">Montant de
                                                                        retrait</label>
                                                                    <input type="number" name="amount"
                                                                        class="form-control" id="amount" required>
                                                                </div>
                                                                <fieldset disabled>
                                                                    <div
                                                                        style="text-align: center; margin-bottom:20px">
                                                                        Vos informations Celtiis Cash</div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Numéro du compte
                                                                            Celtiis Cash</label>
                                                                        <input type="text"
                                                                            class="form-control custom-placeholder"
                                                                            placeholder="(+229) {{ $details->numero_compte }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nom et Prénom</label>
                                                                        <input type="text"
                                                                            class="form-control custom-placeholder"
                                                                            placeholder="{{ $details->nom }}">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="submit"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-primary">Soumettre</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                        <!-- Modals pour Virement Bancaire -->
                                        @if ($parametre->type_de_paiement == 'virement_bancaire')
                                            <div class="modal fade" id="banqueModal" tabindex="-1"
                                                aria-labelledby="banqueModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <span class="modal-title" id="banqueModalLabel"
                                                                style="width:50%; font-size: 10px; color:#344767;font-weight:700">Retrait
                                                                par
                                                                Virement
                                                                Bancaire</span>
                                                            <span style="width:35%;">
                                                                <input
                                                                    style="height:30px; text-align: center; font-weight:800; font-size:10px; padding:0"
                                                                    type="text"
                                                                    class="form-control {{ $balance > 0 ? 'text-success' : 'text-danger' }}"
                                                                    value="{{ $balance }} XOF" disabled>
                                                            </span>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('historique_retraits.store') }}">
                                                                @csrf
                                                                <input type="hidden" name="type_de_paiement"
                                                                    value="virement_bancaire">
                                                                <div class="mb-3">
                                                                    <label for="amount"
                                                                        class="col-form-label">Montant de
                                                                        retrait</label>
                                                                    <input type="number" name="amount"
                                                                        class="form-control" id="amount" required>
                                                                </div>
                                                                <fieldset disabled>
                                                                    <div
                                                                        style="text-align: center; margin-bottom:20px">
                                                                        Vos informations Bancaires</div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nom du titulaire du
                                                                            compte</label>
                                                                        <input type="text"
                                                                            style="color: orange; font-weight:600"
                                                                            class="form-control custom-placeholder"
                                                                            value="{{ $details->nom_titulaire }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nom de la
                                                                            banque</label>
                                                                        <input type="text"
                                                                            style="color: orange; font-weight:600"
                                                                            class="form-control custom-placeholder"
                                                                            value="{{ $details->nom_de_banque }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Numéro de compte /
                                                                            IBAN</label>
                                                                        <input type="text"
                                                                            style="color: orange; font-weight:600"
                                                                            class="form-control custom-placeholder"
                                                                            value="{{ $details->numero_compte_ou_iban }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Code SWIFT /
                                                                            BIC</label>
                                                                        <input type="text"
                                                                            style="color: orange; font-weight:600"
                                                                            class="form-control custom-placeholder"
                                                                            value="{{ $details->code_swift_ou_bic }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Pays de la
                                                                            banque</label>
                                                                        <input type="text"
                                                                            style="color: orange; font-weight:600"
                                                                            class="form-control custom-placeholder"
                                                                            value="{{ $details->pays }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Adresse de la banque
                                                                        </label>
                                                                        <input type="text"
                                                                            style="color: orange; font-weight:600"
                                                                            class="form-control custom-placeholder"
                                                                            value="{{ $details->Adresse_banque }}">
                                                                    </div>
                                                                </fieldset>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="submit"
                                                                        style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                                                        class="btn btn-primary">Soumettre</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- -----------------------------Fin de la zone d'integration du formualire-------------------------------------- --}}
            </div>
        </div>



        <div class="container-fluid py-4">
            <div class="row my-4">
                <div class="col-lg-8 col-md-5">
                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6 style="font-weight: bold; font-size: 18px;">Historiques des retraits</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                    Montant
                                                </th>
                                                <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                    Méthode de
                                                    paiement</th>
                                                <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                    Titulaire
                                                    du compte</th>
                                                <th class="text-uppercase text-dark text-xxl font-weight-bolder">Date
                                                </th>
                                                <th class="text-uppercase text-dark text-xxl font-weight-bolder">Statut
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($HistoriquesdesRetraits as $HistoriquesdesRetrait)
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6> {{ $HistoriquesdesRetrait->montant }} FCFA </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6> {{ $HistoriquesdesRetrait->parametreRetrait->type_de_paiement }}
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        {{-- Titulaire du compte récupéré depuis la colonne 'details', qui stocke les tableaux JSON dans la table 
                                                    'parametre_retraits', via la relation 'parametreRetrait' définie sur la clé étrangère 'parametre_retraits_id' --}}
                                                        <h6>
                                                            {{-- {{ json_decode($HistoriquesdesRetrait->parametreRetrait->details, true)['nom'] }} --}}
                                                            @php
                                                                $details = json_decode(
                                                                    $HistoriquesdesRetrait->parametreRetrait->details,
                                                                    true,
                                                                );
                                                            @endphp

                                                            @if (isset($details['nom']))
                                                                {{ $details['nom'] }}
                                                            @elseif(isset($details['nom_titulaire']))
                                                                {{ $details['nom_titulaire'] }}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6> {{ $HistoriquesdesRetrait->created_at }} </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        @if ($HistoriquesdesRetrait->status == 1)
                                                            <h6 style="color: rgb(15, 228, 15)">Approuvé</h6>
                                                        @else
                                                            <h6 style="color: red;">En attente</h6>
                                                        @endif
                                                    </div>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4 mt-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6 style="font-weight: bold; font-size: 18px;">Historique des vidéos envoyées
                                        </h6>
                                    </div>
                                    <div class="col-lg-6 col-5 my-auto text-end">
                                        <div class="dropdown float-lg-end pe-4">
                                            <!-- <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                    aria-labelledby="dropdownTable">
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                                    </li>
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                            action</a></li>
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                            else here</a></li>
                                                </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    @if ($videos->isEmpty())
                                        <p>&emsp;Aucune vidéo envoyée pour le moment.</p>
                                    @else
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                        Titre
                                                    </th>
                                                    <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                        Genre
                                                    </th>
                                                    <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                        Type
                                                    </th>
                                                    <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                        Date
                                                        d'envoi</th>
                                                    <th class="text-uppercase text-dark text-xxl font-weight-bolder">
                                                        Statut
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($videos as $video)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <img src="{{ asset('storage/' . $video->photos) }}"
                                                                        class="avatar avatar-sm me-3" alt="xd">
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6>{{ $video->title }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <h6>{{ implode(', ', json_decode($video->genres)) }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <h6> {{ $video->type }}</h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <h6>{{ $video->created_at }}</h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                @if ($video->status == 1)
                                                                    <h6 style="color : green">Publiée</h6>
                                                                @else($video->status == 0)
                                                                    <h6 style="color: red;">En attente</h6>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Vidéos les plus rentables</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">{{ number_format($pourcentageRentables, 2) }}%</span>
                                Ce
                                mois
                            </p>
                        </div>
                        <div class="card-body p-3">
                            @if ($videosRentables->isNotEmpty())
                                @foreach ($videosRentables as $vieoscredite)
                                    <div class="timeline timeline-one-side">
                                        <div class="timeline-block mb-3">
                                            <span class="timeline-step">
                                                <i class="ni ni-button-play text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </span>
                                            <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                    {{ $vieoscredite->video->title }}</h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                    {{ $vieoscredite->video->created_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Pas d'inquiètude vos vidéos rentables seront bientôt disponible</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>  
            <div>
            </div>
            @include('frontend.partenaire.Footer')
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
        .card-body .row {
            height: 100px !important;
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

    <style>
        .dropdown-item .notification-unread {
            color: black !important;
            font-weight: bold !important;
        }

        .dropdown-item .notification-read {
            color: black !important;
            font-weight: normal !important;
        }
    </style>

</body>

</html>
