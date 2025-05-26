@extends('frontend.layouts.app')
@section('content')
    <style>
        /* Section À propos de nous */
        .about-section {
            text-align: center;
            padding: 60px 20px;
            background-color: #111;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
        }

        * {
            box-sizing: border-box;
            font-weight: 500;
        }

        .about-section h1 {
            font-size: 42px;
            margin-bottom: 20px;
            color: #fff;
        }

        .about-subtitle {
            font-size: 18px;
            color: #ff5a19;
            margin-bottom: 30px;
        }

        /* Section Équipe */
        .team-section {
            text-align: center;
            padding: 60px 20px;
            background-color: #000;
        }

        .team-section h2 {
            font-size: 36px;
            margin-bottom: 15px;
            color: #fff;
        }

        .team-intro {
            max-width: 800px;
            margin: 0 auto 40px;
            font-size: 16px;
            line-height: 1.6;
            color: #ccc;
        }

        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .team-member {
            width: 260px;
            text-align: left;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .team-member img {
            width: 100%;
            height: 320px;
            object-fit: cover !important;
            transition: transform 1.5s;
        }

        .team-member:hover img {
            transform: scale(1.05);
        }

        .member-role {
            display: inline-block;
            background-color: #ff5a19;
            color: #fff;
            padding: 5px 10px;
            font-size: 12px;
            text-transform: uppercase;
            margin-top: 15px;
        }

        .member-name {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
            color: #fff;
        }

        /* Section Contact */
        .contact-section {
            display: flex;
            align-items: start;
            justify-content: start;
            padding: 60px 20px;
            background-color: #111;
        }

        .map-container {
            flex: 1;
            text-align: justify;
            width: 100px;
            height: 400px;
            box-sizing: border-box;
            font-weight: 600;
        }

        .contact-info {
            flex: 1;
            padding: 0 20px;
            display: flex;
            justify-content: start;
            flex-direction: column;
        }

        .contact-info h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #fff;
        }

        .contact-text {
            font-size: 16px;
            line-height: 1.6;
            color: #ccc;
            margin-bottom: 30px;
        }

        .contact-email {
            color: #ff5a19;
            text-decoration: none;
        }

        .contact-email:hover {
            color: #ff5a19;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
        }

        .stat-box {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #ff5a19;
        }

        .stat-label {
            font-size: 14px;
            color: #ccc;
        }

        /* Section Partenaires */
        .partners-section {
            text-align: center;
            padding: 60px 20px;
            background-color: #000;
        }

        .partners-section h2 {
            font-size: 36px;
            margin-bottom: 50px;
            color: #fff;
        }

        .partners-logos {
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-start;
            gap: 40px;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            animation: scrolly 30s linear infinite;
        }

        @keyframes scrolly {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .partner-logo {
            width: 180px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s;
        }

        .partner-logo:hover {
            filter: grayscale(0);
            opacity: 1;
            transform: scale(1.05);
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .team-members,
            .partners-logos {
                gap: 15px;
            }

            .team-member {
                width: calc(50% - 15px);
            }

            .contact-section {
                flex-direction: column;
            }

            .map-container {
                margin-bottom: 30px;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .team-member {
                width: 100%;
            }

            .stats-container {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>

    <section class="banner w-100">
        <h1>À propos de nous</h1>
        <p class="" style="font-size:24px !important;">Votre destination streaming préférée</p>
    </section>
    <!-- Section Équipe -->
    <section class="team-section">
        <h2>Équipe</h2>
        <div class="team-intro">
            Filmkpamin a été conçu par une équipe expérimentée et passionnée de Drwintech Inc., engagée à offrir une
            plateforme de streaming innovante et de qualité.
        </div>

        <div class="team-members">

            <div class="team-member">
                <img src="{{ asset('./image/designer.jpeg') }}" alt="hervé">
                <div class="member-role">Designer</div>
                <h3 class="member-name">DEGBE Fréjus</h3>
            </div>

            <div class="team-member">
                <img src="{{ asset('./image/hervé.jpg') }}" alt="AGONTINGLO Hervé">
                <div class="member-role">Chef projet</div>
                <h3 class="member-name">AGONTINGLO Hervé</h3>
            </div>

            <div class="team-member">
                <img src="{{ asset('./image/abdoulkowiyoubachabi.jpg') }}" alt="BACHABI Abdou kowiyou">
                <div class="member-role">Développeur</div>
                <h3 class="member-name">BACHABI Abdou kowiyou</h3>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section class="contact-section">
        <div class="map-container">
            <p>Bienvenue sur FILMKPAMIN, la première plateforme de streaming 100 % béninoise dédiée à la mise en valeur
                des
                talents
                et de la culture béninoise, créée en 2023 par l’entreprise DRWINTECH. Inspirés par la richesse et la
                diversité
                de
                notre patrimoine, nous nous engageons à offrir une nouvelle vitrine au cinéma béninois, aux séries,
                documentaires,
                et autres contenus médias créés par des artistes locaux et partenaires. Avec un catalogue soigneusement
                sélectionné, FILMKPAMIN vous invite à explorer l'essence du Bénin à
                travers
                des
                histoires uniques et authentiques. Notre mission est simple : rapprocher les Béninois et les amoureux de
                la
                culture
                béninoise du meilleur du cinéma local, tout en soutenant et en promouvant les créateurs béninois. Sur
                FILMKPAMIN, chaque visionnage contribue directement au développement de l'industrie
                cinématographique
                béninoise,
                permettant aux artistes de continuer à raconter les récits qui nous rassemblent et nous inspirent. . Que
                vous
                soyez
                passionné de drames, d'aventures, de comédies ou de documentaires, nous avons conçu une expérience
                fluide et
                conviviale pour vous offrir le meilleur du divertissement local, où que vous soyez. Rejoignez-nous et
                célébrez l'authenticité et la créativité béninoise à travers des productions qui nous
                ressemblent
                et nous rassemblent.
            </p>
        </div>

        <div class="contact-info">
            <h2>Contactez-Nous Ici</h2>
            <div class="contact-text">
                Nous sommes situé à cotonou/Aibatin et vous pouvez nous contacter à
                <a href="mailto:filmkpamin@filmkpamin.com" class="contact-email">filmkpamin@filmkpamin.com</a>
                pour toute <br /> assistance technique. Nous sommes ravis d'avoir des nouvelles de nos utilisateurs.
            </div>

            <div class="stats-container">
                <div class="stat-box">
                    <div class="stat-number">500 +</div>
                    <div class="stat-label">Employé</div>
                </div>

                <div class="stat-box">
                    <div class="stat-number">1000 +</div>
                    <div class="stat-label">Clients</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Partenaires -->
    <section class="partners-section">
        <h2>Nous Travaillons Avec Les Meilleurs</h2>

        <div class="partners-logos mt-5">
            <div class="partner-logo">
                <img src="{{ asset('./image/logo_afrikatoonhd.webp') }}" alt="afrikatoonhd">
            </div>

            <div class="partner-logo">
                <img src="{{ asset('./image/Logo_Z-Production-300x300_300x300.avif') }}" alt="Z-Production">
            </div>

            <div class="partner-logo">
                <img src="{{ asset('./image/unifrance-header.svg') }}" alt="unifrance">
            </div>

            <div class="partner-logo">
                <img src="{{ asset('./image/GoafrikaOnline.webp') }}" alt="GoafrikaOnline">
            </div>

            <div class="partner-logo">
                <img src="{{ asset('./image/AYE_MB_PNG_WHITE.webp') }}" alt="AYE">
            </div>
        </div>
    </section>
@endsection
