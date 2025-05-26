@extends('frontend.layouts.app')
@section('content')
    <style>
        .parent-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 150px 0 150px 0;
            color: #FFFFFF;
        }

        section .text-container {
            width: 75%;
            color: #FFFFFF;
            /* font-weight: 600; */
            font-size: 16px;
            margin: 5% 0 40px 0;
        }
    </style>



    <section class="banner w-100">
        <h1 style="word-spacing: 10px;">Politique et Confidentialité</h1>
    </section>
    <section class="parent-container" style="background:#1D1D1D">
        <div class="text-container">
            <br>


            <h3 style="color:#EE731D; font-size: 2.5em">1. Introduction</h3>
            <p>
                La présente politique de confidentialité définit comment Filmkpamin collecte, utilise, protège et
                partage
                les informations personnelles de ses utilisateurs lors de l'utilisation de nos services.
            </p>

            <br>

            <h3 style="color:#EE731D;">2. Informations Collectées</h3>
            <p>
                Nous collectons les données suivantes:
                Les Données personnelles
                nom, adresse e-mail, numéro de téléphone, informations de paiement, etc.
                <br>
                Données d'utilisation
                informations sur votre interaction avec notre plateforme, y compris l'historique de visionnage et les
                préférences. <br>
                Les Cookies et technologies similaires
                Pour améliorer votre expérience utilisateur et analyser le trafic sur notre site.
            </p>

            <br>

            <h3 style="color:#EE731D;">3. Finalités de la Collecte des Données</h3>
            <p>
                Les données collectées sont utilisées :
                Pour fournir et améliorer nos services.<br>
                Gérer votre compte et vos abonnements. <br>
                Pour communiquer avec vous concernant votre utilisation du service.<br>
                Analyser l'utilisation de notre plateforme pour optimiser nos offres
            </p>


            <br>

            <h3 style="color:#EE731D;">4. Partage des Informations</h3>
            <p>
                Nous ne partageons vos informations personnelles avec nos partenaires et prestataires uniquement dans le
                cadre
                des services que nous offrons (ex : paiement, support technique). <br>
                Autorités légales: si requis par la loi ou pour protéger nos droits.

            </p>

            <br>

            <h3 style="color:#EE731D;">5. Droits des Utilisateurs</h3>
            <p>
                Conformément à la législation en vigueur, vous disposez des droits suivants : <br>
                Droit d'accès à vos données personnelles.<br>
                Droit de rectification si vos données sont inexactes ou incomplètes.<br>
                Droit à l'effacement de vos données sous certaines conditions.<br>
                Droit d'opposition au traitement de vos données.<br>
                Pour exercer ces droits, veuillez nous contacter à l'adresse suivante : [adresse e-mail].
            </p>

            <br>

            <h3 style="color:#EE731D;">6. Sécurité des Données</h3>
            <p>
                Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données
                <br>
                personnelles contre tout accès non autorisé, perte ou destruction.
            </p>

            <br>

            <h3 style="color:#EE731D;">7. Conservation des Données</h3>
            <p>
                Vos données personnelles sont conservées uniquement pendant la durée nécessaire à la réalisation des
                finalités
                pour lesquelles elles ont été collectées, sans excéder vingt-quatre (24) mois.
            </p>

            <br>

            <h3 style="color:#EE731D;">8. Les cookies</h3>
            <p>
                Nous utilisons des cookies pour améliorer votre expérience sur notre plateforme. Vous pouvez gérer vos
                préférences en matière de cookies via les paramètres de votre navigateur.
            </p>

            <br>

            <h3 style="color:#EE731D;">9. Modifications de la Politique</h3>
            <p>
                Cette politique peut être mise à jour régulièrement. Nous vous informerons des modifications par le
                biais
                d'un avis sur notre site ou par e-mail.
            </p>

            <br>

            <h3 style="color:#EE731D;">10. Contact</h3>
            <p>
                Pour toute question concernant cette politique de confidentialité ou vos données personnelles, veuillez
                nous
                contacter à [adresse e-mail]. Ce modèle doit être adapté aux spécificités et aux pratiques réelles de
                Filmkpamin. <br>
                Il est également conseillé de consulter un expert en protection des données pour s'assurer que toutes
                les
                obligations légales sont respectées.
            </p>


        </div>

    </section>
@endsection
