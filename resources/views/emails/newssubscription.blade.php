<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bienvenue à notre Newsletter !</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            padding: 32px;
        }

        .header {
            text-align: center;
            margin-bottom: 24px;
        }

        .header img {
            width: 80px;
            margin-bottom: 16px;
        }

        .title {
            font-size: 2em;
            color: #fd6716;
            margin-bottom: 8px;
        }

        .content {
            font-size: 1.1em;
            background: #fff7f2;
            border: 2px solid #fd6716;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(253, 103, 22, 0.08);
            padding: 28px 24px;
            color: #222;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .footer {
            text-align: center;
            color: #888;
            font-size: 0.95em;
            margin-top: 32px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">Bienvenue dans la communauté Filmkpamin !</div>
        </div>
        <div class="content">
            Bonjour,<br><br>
            Merci de vous être abonné à notre newsletter !<br>
            Vous recevrez désormais toutes les actualités, nouveautés et offres exclusives directement dans votre boîte
            mail.<br><br>
            Nous sommes ravis de vous compter parmi nos abonnés.<br>
            Restez à l’écoute pour ne rien manquer de l’univers Filmkpamin !<br><br>
            À très bientôt,<br>
            <strong>L’équipe <a href="{{ url('/') }}"
                    style="text-decoration: none;color:#fd6716;">Filmkpamin</a></strong>
        </div>
        <div class="footer">
            Si vous ne souhaitez plus recevoir nos emails, vous pouvez vous <a href="{{ url('desabonnement') }}"style="text-decoration: none;color:#fd6716;">désabonner</a>
            à tout moment.<br>
            &copy; {{ date('Y') }} Filmkpamin. Tous droits réservés.
        </div>
    </div>
</body>

</html>
