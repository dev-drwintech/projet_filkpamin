<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message du Centre d'Aide</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1c1c1c;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
            padding: 30px;
            background-color: #333333;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #f6870c;
            font-size: 28px;
            text-align: center;
            margin-bottom: 10px;
        }

        .section-title {
            font-weight: 600;
            font-size: 18px;
            color: #fff;
            margin-top: 20px;
            margin-bottom: 8px;
        }

        .message-content {
            padding: 15px;
            background-color: #2a2a2a;
            color: #f0f0f0;
            border-left: 5px solid #f6870c;
            margin-top: 10px;
            line-height: 1.8;
            border-radius: 4px;
        }

        .datamsg {
            color: #fd6716;
            font-weight: 600;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #b0b0b0;
            margin-top: 25px;
        }

        .footer a {
            color: #fd6716;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                padding: 20px;
            }

            .section-title {
                font-size: 16px;
                color: #fff;
            }

            .message-content {
                font-size: 14px;
            }

            .footer {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2 style="color: white">Vous avez reçu un message de : {{ $email }}</h2>

        <p class="section-title"><strong>Nom :</strong> <span class="datamsg">{{ $nom }}</span></p>
        <p class="section-title"><strong>Prénom :</strong> <span class="datamsg">{{ $prenom }}</span></p>
        <p class="section-title"><strong>Téléphone :</strong> <span class="datamsg">{{ $telephone }}</span></p>

        @if (!empty($messageContent))
            <p class="section-title"><strong>Message complémentaire :</strong></p>
            <div class="message-content">
                <p>{{ $messageContent }}</p>
            </div>
        @endif
        <div class="footer">
            <p>Ce message provient du centre d'aide de <a href="{{ url('/') }}"><span
                        style="color: #f6870c">{{ config('app.name') }}</span></a>.</p>
        </div>
    </div>
</body>

</html>
