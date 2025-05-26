<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Partenaire/Téléchargement
    </title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}" sizes="125x125">
    <link rel="apple-touch-icon" href="{{ asset('icon/favicon.png') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css') }}" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/soft-ui-dashboard.css') }}">
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
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
                    <a class="nav-link" href="{{ route('frontend.partenaire.dashboard', auth()->user()->id) }}">
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
                        <span class="nav-link-text ms-1">Mon espace personnel</span>
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
                    <a class="nav-link  active" href="{{ route('frontend.partenaire.parametre') }}">
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
                    <h6 class="font-weight-bolder mb-0">Paramètre paiement</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
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


        {{-- Zone de travaille --}}

        <div class="container-fluid py-4">
            <div class="contenaire">
                {{-- Ceci est le boutton principale pour ajouter une nouvelle methode de retrait --}}
                <div class="container text-center" style="padding: 0">
                    <div class="row ">
                        <div class="col-12 " style="display:flex; justify-content:end; align-items:center;">
                            <button style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                type="button" class="btn  my-auto text-center" data-bs-toggle="modal"
                                data-bs-target="#mainModal">Ajouter &emsp;<i
                                    class="fa fa-plus-circle icon_font"></i></button>
                        </div>
                    </div>
                </div>
                <style>
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

                    .form_error {
                        text-align: center;
                        padding: 5px;
                        position: fixed;
                        top: 20px;
                        right: 20px;
                        z-index: 1000;
                        animation: fadeOut 8s 0s forwards;
                        width: 27%;
                        word-wrap: break-word;
                        color: #721c24;
                        /* Texte rouge foncé pour les erreurs */
                    }

                    #notification {
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
                        .text-bas-input {
                            font-size: 15px;
                        }

                        .form_error,
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
                        .text-bas-input {
                            font-size: 10px;
                        }

                        .form_error,
                        #notification {
                            width: 95%;
                            right: 2.5%;
                            font-size: 0.8rem;
                            padding: 8px;
                            top: 5px;
                        }
                    }
                </style>

                {{-- Affiche message de succès après l'ajout ou la suppréssion d'un type de paiement (Mobile et Bancaire) --}}
                @if (session('success'))
                    <div id="notification" class="alert alert-success" style="background: #d4edda;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Erreur si l'utilisateur veut enregistrer le même type de paiement une 2ème fois --}}
                @if ($errors->has('type_de_paiement'))
                    <div class="alert alert-danger form_error" style="background: #f8d7da;">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        {{ $errors->first('type_de_paiement') }}
                    </div>
                @endif

                {{-- Tous les Erreurs du formulaire mobile (S'afficheront sous de notification) --}}
                <div class="erreur_container">
                    {{-- Erreur si l'utilisateur soummet moins de 4 caractères dans l'input --}}
                    @error('details.nom')
                        <div class="alert alert-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Erreur si l'utilisateur insère un numero incorrecte dans l'input. Cas ou il reussit a contouner la verification en Front-End  --}}
                    @error('details.numero_compte')
                        <div class="alert alert-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tous les Erreurs du formulaire bancaire (S'afficheront sous forme de notification) --}}
                <div class="Erreur_contenaire">
                    @error('details.nom_de_banque')
                        <div class="text-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    @error('details.nom_titulaire')
                        <div class="text-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    @error('details.numero_compte_ou_iban')
                        <div class="text-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    @error('details.code_swift_ou_bic')
                        <div class="text-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    @error('details.pays')
                        <div class="text-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    @error('details.Adresse_banque')
                        <div class="text-danger form_error" style="background: #f8d7da;">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- (La boucle de verification) Vérifie s’il y a des types de paiement ajouter dans la BDD --}}

                @if ($parametresRetrait->isNotEmpty())
                    <div class="container">
                        <div class="row">
                            @foreach ($parametresRetrait as $index => $parametre)
                                @php
                                    $details = json_decode($parametre->details);
                                @endphp
                                @if ($details)
                                    <!-- Colonne avec largeur pour deux cards par ligne sur écran moyen et supérieur -->
                                    <div class="col-md-6 mb-4 d-flex justify-content-center">
                                        <!-- Card pour afficher les informations de chaque moyen de paiement -->
                                        <div class="card text-center bg-secondary py-3"
                                            style="border-radius:10px; background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%); width: 90%; position: relative;">
                                            <div class="row align-items-center mx-0">
                                                <!-- Colonne pour afficher le logo du type de paiement -->
                                                <div
                                                    class="col-2 px-1 d-flex justify-content-center align-items-center">
                                                    @if (strtolower($parametre->type_de_paiement) === 'mobile money')
                                                        <img src="https://seeklogo.com/images/M/MTN-logo-459AAF9482-seeklogo.com.png"
                                                            class="img-fluid"
                                                            style="max-width: 35px; max-height:35px; border-radius:5px;"
                                                            alt="logo-mobile-money">
                                                    @elseif(strtolower($parametre->type_de_paiement) === 'moov money')
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGifrz7mE_KW1gxu72jPeoC05r8lTSCyIYrg&s"
                                                            class="img-fluid"
                                                            style="max-width: 35px; max-height:35px; border-radius:5px;"
                                                            alt="logo-moov-money">
                                                    @elseif(strtolower($parametre->type_de_paiement) === 'celtiis cash')
                                                        <img src="https://media.licdn.com/dms/image/v2/D4E0BAQHtTO1iuxkoyA/company-logo_200_200/company-logo_200_200/0/1666366806951?e=1738195200&v=beta&t=wIjO6184QoxDmhgIHRi3tH7FDFx2oIlJSb-ktf0A6SM"
                                                            class="img-fluid"
                                                            style="max-width: 35px; max-height:35px; border-radius:5px;"
                                                            alt="logo-celtiis-cash">
                                                    @elseif(strtolower($parametre->type_de_paiement) === 'virement_bancaire')
                                                        <img src="https://cdn-icons-png.freepik.com/256/11635/11635161.png?ga=GA1.1.611015373.1716337851&semt=ais_hybrid"
                                                            class="img-fluid"
                                                            style="max-width:35px; max-height:35px; border-radius:5px; background:white;"
                                                            alt="logo-virement-bancaire">
                                                    @endif
                                                </div>
                                                <!-- Colonne pour afficher les détails spécifiques au type de paiement -->
                                                <div class="col-8 px-1">
                                                    {{-- Informations Mobile --}}
                                                    @if (in_array(strtolower($parametre->type_de_paiement), ['mobile money', 'moov money', 'celtiis cash']))
                                                        <div style="font-size: 12px;font-weight:700;"> <span style="font-weight:700; color:black">Nom Complet:</span>  {{ $details->nom }}
                                                        </div>
                                                        <div style="font-size: 12px;font-weight:700;"><span style="font-weight:700; color:black">Numéro:</span> (+229)
                                                            {{ $details->numero_compte }}</div>
                                                        {{-- Informations Virement Bancaire --}}
                                                    @elseif(strtolower($parametre->type_de_paiement) === 'virement_bancaire')
                                                        <div style="font-size: 12px;font-weight:700;"><span style="font-weight:700; color:black">Nom du titulaire du compte:</span>
                                                            {{ $details->nom_titulaire }}</div>
                                                        <div style="font-size: 12px;font-weight:700;"><span style="font-weight:700; color:black">Nom de la banque:</span> 
                                                            {{ $details->nom_de_banque }}</div>
                                                        <div style="font-size: 12px;font-weight:700;"> <span style="font-weight:700; color:black">Numéro de compte / IBAN:</span>
                                                            {{ $details->numero_compte_ou_iban }}</div>
                                                        <div style="font-size: 12px;font-weight:700;"><span style="font-weight:700; color:black">Code SWIFT / BIC:</span>
                                                            {{ $details->code_swift_ou_bic }}</div>
                                                        <div style="font-size: 12px;font-weight:700;"><span style="font-weight:700; color:black">Pays de la banque:</span>
                                                            {{ $details->pays }}</div>
                                                        <div style="font-size: 12px;font-weight:700;"><span style="font-weight:700; color:black">Adresse de la banque:</span>
                                                            {{ $details->Adresse_banque }}</div>
                                                    @endif
                                                </div>
                                                <!-- Colonne pour le bouton de suppression -->
                                                <div
                                                    class="col-2 px-1 d-flex justify-content-center align-items-center p-0">
                                                    {{-- Formulaire de suppression(Boutton supprimer) --}}
                                                    <form
                                                        action="{{ route('parametre.supprimer.toutTypePaiement', $parametre->id) }}"
                                                        method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm p-1 d-flex justify-content-center align-items-center"
                                                            style="background: #c82333; width: 30px; height: 30px; border-radius: 5px;">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Insérer une nouvelle ligne après chaque paire de cards -->
                                    @if (($index + 1) % 2 === 0)
                        </div>
                        <div class="row">
                @endif
                @endif
                @endforeach
            </div>
        </div>
    @else
        <!-- Message affiché lorsque aucun moyen de paiement n'est disponible -->
        <h6 style="text-align:center; color: red;  padding-top: 20%;">Aucun moyen de paiement n'a été ajouté.</h6>
        @endif




        {{-- Les modales --}}
        <div class="contenaire-formulaire-modale">
            {{-- Premier Modal avec les choix des options de paiement --}}
            <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="mainModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    {{-- redimension a 95% pour cacher derriere le deuxieme Modale --}}
                    <div class="modal-content" style="width:95%">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mainModalLabel">Choisissez une méthode de retrait</h5>
                            {{-- bouton pour fermer le modal --}}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="background:black; display:flex;justify-content:center;align-items:center"><i
                                        class="fas fa-times"></i>
                                </button> --}}
                        </div>
                        <div class="modal-body text-center">
                            <button class="btn btn-secondary m-2"
                                style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                onclick="openPaymentForm('Mobile Money')">Mobile
                                Money (MTN)</button>
                            <button class="btn btn-secondary m-2"
                                style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                onclick="openPaymentForm('Moov Money')">Moov
                                Money</button>
                            <button class="btn btn-secondary m-2"
                                style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                onclick="openPaymentForm('Celtiis Cash')">Celtiis Cash</button>
                            <button class="btn btn-secondary m-2"
                                style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                onclick="openBankTransferForm()">Virement
                                Bancaire</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- (Deuxième Modale) Formulaire soumission pour [Mobile Money, Moov Money, et Celtiis Cash] UNIQUEMNT --}}
            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        {{-- Formulaire --}}
                        <form id="paymentForm" method="Post"
                            action="{{ route('frontend.partenaire.parametreMobile') }}">
                            @csrf
                            <div class="modal-body">
                                {{-- Input cacher type_paiement --}}
                                <input type="hidden" id="paymentMethod" name="type_de_paiement">
                                {{-- Input cacher user_id --}}
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                {{-- Ici j'effectue une verification Front-End des donnée entrer dans l'input pour plus de securité  --}}
                                <div class="form-group">
                                    <label for="phoneNumber">Numéro de téléphone</label>
                                    {{-- verification au coté Front-End grace au pattern NB:Sa prend en charge le nouveau format des numéro en Répulique du Bénin --}}
                                    <input type="text" class="form-control" id="phoneNumber"
                                        name="details[numero_compte]" required placeholder="Ex: 01 69 00 00 00"
                                        pattern="^[0-9]{8,10}$"
                                        title="Entrez un numéro de 8 à 10 chiffres sans préfixe +229 ou autres caractères">
                                    @error('details.numero_compte')
                                        <div class="text-danger text-bas-input"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Nom complet</label>
                                    <input type="text" class="form-control" id="name" name="details[nom]"
                                        required placeholder="Ex: John Doe">
                                    @error('details.nom')
                                        <div class="text-danger text-bas-input"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                    class="btn btn-primary">Soumettre</button>
                                <button type="button"
                                    style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                    class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- (Deuxieme)Formulaire Modal soumission pour [virement Bancaire] UNIQUEMENT --}}
            <div class="modal fade" id="bankTransferModal" tabindex="-1" aria-labelledby="bankTransferModalLabel"
                aria-hidden="true">

                <style>
                    /* Style pour rendre le formulaire scrollable sur les petits écrans */
                    #bankTransferModal .modal-dialog {
                        max-height: 90vh;
                        /* Limite la hauteur de la modal */
                        display: flex;
                        align-items: center;
                        /* Centre verticalement */
                    }

                    #bankTransferModal .modal-content {
                        overflow: hidden;
                        width: 100%;
                    }

                    #bankTransferModal .modal-body {
                        max-height: 60vh;
                        /* Ajuste selon la taille d'écran souhaitée */
                        overflow-y: auto;
                        /* Active le scroll uniquement sur le contenu */
                        padding: 15px;
                    }

                    /* Facultatif : Style pour réduire l'espace de la modal sur les très petits écrans */
                    @media (max-width: 576px) {
                        #bankTransferModal .modal-body {
                            max-height: 55vh;
                            /* Hauteur réduite pour écrans plus petits */
                        }
                    }
                </style>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bankTransferModalLabel">Ajoutez vos infos de Virement
                                Bancaire</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        {{-- Formulaire --}}
                        <form id="bankTransferForm" method="POST"
                            action="{{ route('frontend.partenaire.parametreBanqueVirement') }}">
                            @csrf
                            <div class="modal-body">
                                {{-- Input cacher type_de_paiement --}}
                                <input type="hidden" id="bankTransferMethod" name="type_de_paiement"
                                    value="virement_bancaire">
                                {{-- Input cacher user_id --}}
                                <input type="hidden" id="bankUserId" name="user_id" value="{{ auth()->id() }}">

                                <div class="form-group">
                                    <label for="accountHolderName">Nom du titulaire du compte</label>
                                    <input type="text" class="form-control" id="accountHolderName"
                                        name="details[nom_titulaire]" required placeholder="Ex: John Doe"
                                        pattern=".{4,35}" title="Le nom doit comporter entre 4 et 35 caractères.">
                                    @error('details.nom_titulaire')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bankName">Nom de la banque</label>
                                    <input type="text" class="form-control" id="bankName"
                                        name="details[nom_de_banque]" required placeholder="Ex: Banque of Africa"
                                        pattern=".{1,50}"
                                        title="Le nom de la banque ne doit pas dépasser 50 caractères.">
                                    @error('details.nom_de_banque')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="accountNumber">Numéro de compte / IBAN</label>
                                    <input type="text" class="form-control" id="accountNumber"
                                        name="details[numero_compte_ou_iban]" required
                                        placeholder="Ex: BJ7630006000011234567890189" pattern="^[A-Za-z0-9]{8,34}$"
                                        title="Le numéro de compte ou IBAN doit contenir entre 8 et 34 caractères alphanumériques.">
                                    @error('details.numero_compte_ou_iban')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="swiftCode">Code SWIFT / BIC</label>
                                    <input type="text" class="form-control" id="swiftCode"
                                        name="details[code_swift_ou_bic]" required placeholder="Ex: BICCODEXXX"
                                        pattern="^[A-Za-z0-9]{8,11}$"
                                        title="Le code SWIFT/BIC doit comporter entre 8 et 11 caractères.">
                                    @error('details.code_swift_ou_bic')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="country">Pays de la banque</label>
                                    <input type="text" class="form-control" id="country" name="details[pays]"
                                        required placeholder="Ex: Bénin" pattern=".{1,20}"
                                        title="Le pays ne doit pas dépasser 20 caractères.">
                                    @error('details.pays')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bankAddress">Adresse de la banque</label>
                                    <input type="text" class="form-control" id="bankAddress"
                                        name="details[Adresse_banque]" required
                                        placeholder="Ex: Avenue Jean-Paul II, Cotonou" pattern=".{1,60}"
                                        title="L'adresse de la banque ne doit pas dépasser 60 caractères.">
                                    @error('details.Adresse_banque')
                                        <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                    class="btn btn-primary">Soumettre</button>
                                <button type="button"
                                    style="background-image: linear-gradient(106.68deg, #eeb500 0%, #ff5a19 100%);"
                                    class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
    <!--   Core JS Files   -->
    {{-- <script src="{{ asset('assets/js/core/formulaire.js') }}"></script> --}}
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




    {{-- Le script pour les formulaires de retrait  --}}
    <script>
        // cette fonction permet de mettre a jour de manière dynamique la valeur de l'input cacher dans le formulaire des paiements mobile
        function openPaymentForm(method) {
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            document.getElementById('paymentMethod').value = method;
            document.getElementById('paymentModalLabel').textContent = method;
            paymentModal.show();
        }
        //Cette fonction permet d'ouvrir le modal spécifique au formulaire de Virement Bancaire lorsque l'utilisateur clique sur le bouton correspondant
        function openBankTransferForm() {
            const bankTransferModal = new bootstrap.Modal(document.getElementById('bankTransferModal'));
            bankTransferModal.show();
        }

        // Nettoyage du backdrop lors de la fermeture de modals
        document.addEventListener('hidden.bs.modal', function() {
            if (document.querySelectorAll('.modal.show').length === 0) {
                document.body.classList.remove('modal-open');
                let backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) backdrop.remove();
            }
        });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
