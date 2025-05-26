<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance en cours - Filmkpamin</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Ccircle cx='32' cy='32' r='28' fill='white'/%3E%3Cg%3E%3Cpath d='M54.6 36.5c.2-1 .4-2 .4-3.1s-.1-2.1-.4-3.1l4.5-3.5c.4-.3.5-.9.2-1.4l-4.3-7.4c-.3-.5-.9-.6-1.4-.4l-5.3 2.1c-1.6-1.2-3.3-2.2-5.2-2.9l-.8-5.6c-.1-.5-.6-.9-1.1-.9h-8.6c-.5 0-1 .4-1.1.9l-.8 5.6c-1.9.7-3.6 1.7-5.2 2.9l-5.3-2.1c-.5-.2-1.1 0-1.4.4l-4.3 7.4c-.3.5-.2 1.1.2 1.4l4.5 3.5c-.2 1-.4 2-.4 3.1s.1 2.1.4 3.1l-4.5 3.5c-.4.3-.5.9-.2 1.4l4.3 7.4c.3.5.9.6 1.4.4l5.3-2.1c1.6 1.2 3.3 2.2 5.2 2.9l.8 5.6c.1.5.6.9 1.1.9h8.6c.5 0 1-.4 1.1-.9l.8-5.6c1.9-.7 3.6-1.7 5.2-2.9l5.3 2.1c.5.2 1.1 0 1.4-.4l4.3-7.4c.3-.5.2-1.1-.2-1.4l-4.5-3.5zM32 41c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z' fill='%23fd6716'/%3E%3C/g%3E%3C/svg%3E">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0d0d0d 100%);
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Particules d'arrière-plan */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(253, 103, 22, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            left: 85%;
            animation-delay: 2s;
        }

        .particle:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }

        .particle:nth-child(4) {
            width: 40px;
            height: 40px;
            top: 30%;
            left: 80%;
            animation-delay: 1s;
        }

        .particle:nth-child(5) {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 60%;
            animation-delay: 3s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.1;
            }

            33% {
                transform: translateY(-30px) rotate(120deg);
                opacity: 0.3;
            }

            66% {
                transform: translateY(-60px) rotate(240deg);
                opacity: 0.1;
            }
        }

        /* Container principal */
        .container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        /* Logo */
        .logo {
            margin-bottom: 40px;
            position: relative;
        }

        .logo-text {
            font-size: 3.5rem;
            font-weight: bold;
            background: linear-gradient(45deg, #fd6716, #ff8c42);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(253, 103, 22, 0.3);
            margin-bottom: 10px;
        }

        .logo-subtitle {
            font-size: 1.1rem;
            color: #999;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* Icône de maintenance */
        .maintenance-icon {
            width: 120px;
            height: 120px;
            margin: 40px auto;
            position: relative;
        }

        .gear {
            width: 100%;
            height: 100%;
            border: 4px solid #fd6716;
            border-radius: 50%;
            position: relative;
            animation: rotate 4s linear infinite;
        }

        .gear::before,
        .gear::after {
            content: '';
            position: absolute;
            background: #fd6716;
        }

        .gear::before {
            width: 20px;
            height: 8px;
            top: -4px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 4px;
        }

        .gear::after {
            width: 8px;
            height: 20px;
            top: 50%;
            right: -4px;
            transform: translateY(-50%);
            border-radius: 4px;
        }

        .inner-gear {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            background: #fd6716;
            border-radius: 50%;
            animation: rotate-reverse 3s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes rotate-reverse {
            from {
                transform: translate(-50%, -50%) rotate(360deg);
            }

            to {
                transform: translate(-50%, -50%) rotate(0deg);
            }
        }

        /* Contenu principal */
        .main-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .title {
            font-size: 2.8rem;
            font-weight: 300;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff, #cccccc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .description {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #aaa;
            margin-bottom: 40px;
        }

        /* Barre de progression */
        .progress-section {
            margin: 50px 0;
        }

        .progress-label {
            color: #fd6716;
            margin-bottom: 15px;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
            position: relative;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #fd6716, #ff8c42);
            border-radius: 3px;
            animation: progress 3s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(253, 103, 22, 0.5);
        }

        @keyframes progress {
            0% {
                width: 0%;
            }

            50% {
                width: 70%;
            }

            100% {
                width: 0%;
            }
        }

        /* Estimation */
        .eta {
            margin-top: 30px;
            padding: 20px;
            background: rgba(253, 103, 22, 0.1);
            border: 1px solid rgba(253, 103, 22, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .eta-title {
            color: #fd6716;
            font-size: 1rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .eta-time {
            font-size: 1.4rem;
            font-weight: 300;
        }

        /* Réseaux sociaux */
        .social-links {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 0 0 30px 0 !important;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-link:hover {
            background: #fd6716;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(253, 103, 22, 0.4);
        }

        /* Footer */
        .footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #666;
            font-size: 0.9rem;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }

        /* Animations d'entrée */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        .slide-up {
            animation: slideUp 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media screen and (max-width:768px) {
            .logo-text {
                font-size: 2.5rem;
            }

            .title {
                font-size: 2rem;
            }

            .description {
                font-size: 1rem;
            }

            .maintenance-icon {
                width: 80px;
                height: 80px;
            }

            .social-link {
                width: 40px;
                height: 40px;
            }

            .container {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                font-size: 2rem;
            }

            .title {
                font-size: 1.6rem;
            }

            .social-links {
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Particules d'arrière-plan -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Container principal -->
    <div class="container">
        <!-- Logo -->
        <div class="logo fade-in">
            <div class="logo-text">Filmkpamin</div>
            <div class="logo-subtitle">Premium Streaming</div>
        </div>

        <!-- Icône de maintenance -->
        <div class="maintenance-icon slide-up">
            <div class="gear">
                <div class="inner-gear"></div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content slide-up">
            <h1 class="title">Maintenance en cours</h1>
            <p class="description">
                Nous améliorons actuellement notre plateforme pour vous offrir une expérience de streaming encore plus exceptionnelle.
                Nos équipes travaillent dur pour rétablir le service dans les plus brefs délais.
            </p>

            <!-- Barre de progression -->
            <div class="progress-section">
                <div class="progress-label">Progression de la maintenance</div>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>

            <!-- Estimation -->
            <div class="eta">
                <div class="eta-title">Temps estimé de retour</div>
                <div class="eta-time">Environ 2 heures</div>
            </div>

            <!-- Réseaux sociaux -->
            <div class="social-links">
                <a href="#" class="social-link" title="Twitter">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </a>
                <a href="#" class="social-link" title="Facebook">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
                <a href="#" class="social-link" title="Instagram">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
                <a href="#" class="social-link" title="YouTube">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        © 2025 Filmkpamin. Tous droits réservés.
    </div>

    <script>
        // Animation d'apparition au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.fade-in, .slide-up');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.2}s`;
            });
        });

        // Mise à jour du temps en temps réel (persistant)
        function updateTime() {
            const etaElement = document.querySelector('.eta-time');

            // Vérifier si une maintenance est déjà en cours
            let maintenanceStartTime = localStorage.getItem('maintenanceStartTime');
            let maintenanceDuration = localStorage.getItem('maintenanceDuration');

            // Si pas de maintenance en cours, en créer une nouvelle
            if (!maintenanceStartTime || !maintenanceDuration) {
                maintenanceStartTime = new Date().getTime();
                maintenanceDuration = 2 * 60 * 60 * 1000; // 2 heures en millisecondes

                // Sauvegarder dans localStorage
                localStorage.setItem('maintenanceStartTime', maintenanceStartTime);
                localStorage.setItem('maintenanceDuration', maintenanceDuration);
            } else {
                // Récupérer les valeurs existantes
                maintenanceStartTime = parseInt(maintenanceStartTime);
                maintenanceDuration = parseInt(maintenanceDuration);
            }

            function updateCountdown() {
                const currentTime = new Date().getTime();
                const elapsed = currentTime - maintenanceStartTime;
                const remaining = Math.max(maintenanceDuration - elapsed, 0);

                if (remaining > 0) {
                    const hours = Math.floor(remaining / (1000 * 60 * 60));
                    const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((remaining % (1000 * 60)) / 1000);

                    etaElement.textContent = `${hours}h ${minutes}min ${seconds}s`;
                } else {
                    etaElement.textContent = 'Maintenance terminée !';
                    // Optionnel: nettoyer le localStorage
                    localStorage.removeItem('maintenanceStartTime');
                    localStorage.removeItem('maintenanceDuration');
                }
            }

            // Mettre à jour immédiatement
            updateCountdown();

            // Mettre à jour toutes les secondes
            setInterval(updateCountdown, 1000);
        }

        // Fonction pour réinitialiser la maintenance (utile pour les tests)
        function resetMaintenance() {
            localStorage.removeItem('maintenanceStartTime');
            localStorage.removeItem('maintenanceDuration');
            location.reload();
        }

        // Fonction pour définir une durée personnalisée (en minutes)
        function setMaintenanceDuration(minutes) {
            const startTime = new Date().getTime();
            const duration = minutes * 60 * 1000;

            localStorage.setItem('maintenanceStartTime', startTime);
            localStorage.setItem('maintenanceDuration', duration);
            location.reload();
        }

        updateTime();
    </script>
</body>

</html>