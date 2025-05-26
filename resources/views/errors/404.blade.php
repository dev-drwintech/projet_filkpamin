<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404 - Page non trouvée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .error-container {
            max-width: 800px;
            padding: 20px;
        }

        .error-code {
            font-size: 150px;
            font-weight: bold;
            transform: rotate(-5deg);
            margin-bottom: 20px;
            letter-spacing: -5px;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
            position: relative;
        }

        .error-message::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            height: 1px;
            background-color: #ff5a19;
        }

        .error-description {
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 16px;
            color: #aaa;
        }

        .home-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #ff5a19;
            color: white;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .home-button:hover {
            background-color: #fd7139;
        }

        .settings-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 20px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oups ! Quelque chose s'est mal passé</div>
        <div class="error-description">
            Nous sommes désolés, il semble que la page que vous recherchez ne soit pas dans notre système
        </div>
        <a href="{{ url('/') }}" class="home-button">
            RETOUR À LA MAISON <span style="margin-left: 5px;">▶</span>
        </a>
    </div>
    <div class="settings-icon">⚙</div>
</body>

</html>
