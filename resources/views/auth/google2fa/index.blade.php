<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Centrer le titre du modal */
        .modal-title {
            text-align: center;
            width: 100%;
        }

        /* Définir l'arrière-plan du body avec une image */
        body {
            background: url('{{ asset('img/section/sectionn.jpg') }}') no-repeat center center;
            background-size: cover; /* Garder l'image entière */
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Style pour l'en-tête et le bouton */
        .modal-header,
        .btn-primary {
            background: linear-gradient(45deg, orange, darkorange);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, darkorange, orange);
        }

        /* Réduction du titre sur les petits écrans */
        @media (max-width: 991px) {
            .reduction-title {
                font-size: 16px;
            }
        }

        /* Style pour les notifications */
        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            display: none;
            z-index: 9999;
        }

        .notification-success {
            /* background-color: #28a745; Couleur verte */
            background-color: #d4edda;
            color: #155724;
        }

        .notification-error {
            background-color: #f8d7da;;
            color: #c82333;
            
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white">
                        <h5 class="modal-title reduction-title" id="otpModalLabel">AUTHENTIFICATION A DEUX FACTEURS</h5>
                    </div>
                    <div class="modal-body">
                        <p><strong>Entrez le code à 6 chiffres de Google Authenticator</strong>.</p>

                        <form method="POST" action="{{ route('2fa.verify.post') }}">
                            @csrf
                            <div class="form-group d-flex">
                                <input type="text" name="google_auth_code" id="google_auth_code" class="form-control"
                                    placeholder="Code à 6 chiffres" required maxlength="6" pattern="\d{6}"
                                    style="width: 95%">
                                <button type="submit" class="btn btn-primary mx-3">Vérifier</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <small class="text-muted">Besoin d'aide? <a href="{{ route('centreaide') }}" style="text-decoration: none">
                                Contacter le support</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications -->
    <div id="notification" class="notification"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
            otpModal.show();

            // Affichage de la notification
            function showNotification(message, type) {
                const notification = document.getElementById('notification');
                notification.classList.remove('notification-success', 'notification-error');
                notification.classList.add(type === 'success' ? 'notification-success' : 'notification-error');
                notification.textContent = message;
                notification.style.display = 'block';

                // Masquer la notification après 8 secondes
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 8000);
            }

            // Exemple de notification succès et erreur
            @if (session('success'))
                showNotification("{{ session('success') }}", 'success');
            @elseif (session('error'))
                showNotification("{{ session('error') }}", 'error');
            @endif
        });
    </script>
</body>

</html>
