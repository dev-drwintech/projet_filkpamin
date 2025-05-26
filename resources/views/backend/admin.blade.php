@extends('backend.layouts.app')

@section('content')

    <head>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Favicons -->
        <link rel="icon" type="image/png" href="{{ asset('icon/faviconFilm.png') }}" sizes="125x125">
        <link rel="apple-touch-icon" href="{{ asset('icon/faviconFilm.png') }}">
        <!-- Nucleo Icons -->
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
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <button id="adminside"><i class="fa-solid fa-bars"></i></button>
                <div class="main__title">
                    <h2 style="color: black !important;">Bienvenue sur votre tableau de bord {{ auth()->user()->role->nom }}
                    </h2>

                    <!-- Notification Icon -->
                    <div class="notification-icon">

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
                                                                class="font-weight-bold  {{ is_null($notification->read_at) ? 'notification-unread' : 'notification-read' }}">{{ $notification->data['message'] }}</span>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i
                                                                class="fa fa-clock me-1"></i><span>{{ $notification->created_at }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <a href="{{ route('notifications.read', $notification->id) }}">Marquer
                                                        comme lu</a>&emsp;
                                                    <!-- <a href="{{ route('admin.videos.voir', $notification->id) }}">Voir la vidéo</a> -->
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
            <!-- end main title -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-xl-3"
                style="margin: px !important;  border-radius: 6px 0 0 6px !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="stats">
                    <span style="color: black !important;font-size:18px;">Vues ce mois-ci</span>
                    <p style="color: black !important;">{{ formatNumber($viewsThisMonth) }}</p>
                    <i class="icon ion-ios-stats"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-xl-3"
                style="border: 1px solid white !important; margin: px !important; border-radius: px !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="stats">
                    <span style="color: black !important;font-size:18px;">Vidéos ajoutés ce mois-ci</span>
                    <p style="color: black !important;">{{ formatNumber($itemsAddedThisMonth) }}</p>
                    <i class="icon ion-ios-film"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-xl-3"
                style="border: 1px solid white !important; margin: px !important; border-radius: px !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="stats">
                    <span style="color: black !important;font-size:18px;">Nouveaux commentaires</span>
                    <p style="color: black !important;">{{ formatNumber($newComments) }}</p>
                    <i class="icon ion-ios-chatbubbles"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- stats -->
            <div class="col-12 col-sm-6 col-xl-3"
                style="margin: px !important; border-radius: 0 6px 6px 0 !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="stats">
                    <span style="color: black !important;font-size:18px;">Nouveaux avis</span>
                    <p style="color: black !important;">{{ formatNumber($newReviews) }}</p>
                    <i class="icon ion-ios-star-half"></i>
                </div>
            </div>
            <!-- end stats -->

            <!-- dashbox -->
            <div class="col-12 col-xl-6"
                style="margin-top: 15px !important; border-radius: 6px 0 0 6px !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="dashbox">
                    <div class="dashbox__title">
                        <h3 style="color: black !important;font-size:18px;"><i class="icon ion-ios-trophy"></i> Vidéos
                            phares</h3>

                        <div class="dashbox__wrap">
                            <a class="dashbox__refresh" href="#" style="color: black !important;"><i
                                    class="icon ion-ios-refresh"></i></a>
                            <a class="dashbox__more" href="{{ route('videos.index') }}"
                                style="color: black !important;font-size:14px;">Voir tout</a>
                        </div>
                    </div>
                    <div class="dashbox__table-wrap">
                        <table class="main__table main__table--dash">
                            <thead>
                                <tr style="background-color: white !important;">
                                    <th style="color: black !important;font-size:18px;">TITRE</th>
                                    <th style="color: black !important;font-size:18px;">CATÉGORIE</th>
                                    <th style="color: black !important;font-size:18px;">ÉVALUATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topVideos as $topVideo)
                                    <tr>
                                        <td>
                                            <div class="main__table-text" style="color: black !important;">
                                                {{ $topVideo->title }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text" style="color: black !important;">
                                                {{ ucfirst($topVideo->type) }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text main__table-text--rate"
                                                style="color: black !important;">
                                                <i class="icon ion-ios-star"></i> {{ $topVideo->imdb_rating }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end dashbox -->

            <!-- dashbox -->
            <div class="col-12 col-xl-6"
                style="margin-top: 15px !important; border-radius: 0 6px 6px 0 !important; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;">
                <div class="dashbox">
                    <div class="dashbox__title">
                        <h3 style="color: black !important;font-size:18px;"><i class="icon ion-ios-film"></i> Dernières
                            vidéos</h3>

                        <div class="dashbox__wrap">
                            <a class="dashbox__refresh" href="#" style="color: black !important;"><i
                                    class="icon ion-ios-refresh"></i></a>
                            <a class="dashbox__more" href="{{ route('videos.index') }}"
                                style="color: black !important;font-size:14px;">Voir tout</a>
                        </div>
                    </div>

                    <div class="dashbox__table-wrap">
                        <table class="main__table main__table--dash">
                            <thead>
                                <tr style="background-color: white !important;">
                                    <th style="color: black !important; font-size:18px;">TITRE</th>
                                    <th style="color: black !important; font-size:18px;">CATÉGORIE</th>
                                    <th style="color: black !important; font-size:18px;">ÉVALUATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestVideos as $latestVideo)
                                    <tr>
                                        <td>
                                            <div class="main__table-text" style="color: black !important;">
                                                {{ $latestVideo->title }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text" style="color: black !important;">
                                                {{ ucfirst($latestVideo->type) }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text main__table-text--rate"
                                                style="color: black !important;">
                                                <i class="icon ion-ios-star"></i> {{ $latestVideo->imdb_rating }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end dashbox -->
        </div>
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


        // Affichage du menus sidebar pour l'admin
        let adminside = document.getElementById("adminside");
        let menuside = document.querySelector('.sidebar');

        adminside.addEventListener('click', () => {
            menuside.classList.toggle('sidebar--active');
        });
        // Fermer le menu si on clique en dehors
        window.addEventListener("click", (event) => {
            if (!menuside.contains(event.target) && !adminside.contains(event.target)) {
                menuside.classList.remove("sidebar--active");
            }
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
@endsection
<!-- Assurez-vous d'inclure jQuery et Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/3a537738e0.js" crossorigin="anonymous"></script>

<style>
    .notification-icon {
        margin-left: 1100px;
    }

    .notification-icon i {
        font-size: 20px;
        color: #8392AB;
    }

    .text-xs .fa-clock {
        font-size: 0.75rem;
        color: gray;
    }

    .nav-item {
        margin-top: -45px;
    }

    .notification-icon .badge {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 5px;
        font-size: 12px;
    }

    .main__title {
        margin-top: 20px;
    }

    .dropdown-item .notification-unread {
        color: black !important;
        font-weight: bold !important;
    }

    .dropdown-item .notification-read {
        color: black !important;
        font-weight: normal !important;
    }
</style>
