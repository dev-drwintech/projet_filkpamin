<footer class="footer pt-3" style="background: transparent !important;">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    Propulsé par
                    <a href="https://www.drwintech.com" style="color: #3490dc;" class="font-weight-bold"
                        target="_blank">Drwintech Inc</a>.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.drwintech.com" style="color: #3490dc;" class="nav-link text-muted"
                            target="_blank">Creative
                            Drwintech</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('condition') }}" class="nav-link text-muted" style="color: #3490dc;"
                            target="_blank">Conditions
                            d'utilisation</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('politique') }}" class="nav-link text-muted" style="color: #3490dc;"
                            target="_blank">Politique
                            et confidentialités</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <style>
        .profile__input {
            height: 46px;
            font-size: 16px;
            line-height: 0.4px;
            width: 100% !important;
            color: #000 !important;
            outline: none;
            border: none;
            border-radius: 6px;
            padding: 8px;
        }

        .profile__btn {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -moz-box-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            height: 46px;
            width: 20%;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            background-color: transparent;
            font-size: 14px;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border: 1px solid #ffd80e;
            margin-top: 10px;
        }

        .casePass {
            display: flex !important;
            flex-direction: row !important;
            justify-content: center;

        }

        .card__cover {
            position: relative;
            -webkit-transition: 0.4s ease;
            -moz-transition: 0.4s ease;
            transition: 0.4s ease;
            width: 190px;
            height: 220px;
            overflow: hidden;
            border-radius: 5px;
            padding: 0 !important;
            will-change: transform;
            transition: all 0.3s ease-in-out;
        }

        .card__cover:hover {
            transform: scale(1.02);
        }

        .card__cover img {
            width: 100%;
            height: 100%;
            object-fit: fill;
            border-radius: 5px;
        }

        .card__cover:before {
            content: "";
            position: absolute;
            display: block;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(26, 25, 31, 0.8);
            z-index: 2;
            opacity: 0;
            -webkit-transition: 0.4s ease;
            -moz-transition: 0.4s ease;
            transition: 0.4s ease;
        }

        .card__cover:hover:before {
            opacity: 1;
        }

        .card__cover:hover .card__play {
            opacity: 1;
        }

        .card__play {
            position: absolute;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -moz-box-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.1);
            -webkit-border-radius: 50%;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            margin: -30px 0 0 -30px;
            z-index: 3;
            font-size: 30px;
            color: #fd6060;
            -webkit-transition: 0.4s ease;
            -moz-transition: 0.4s ease;
            transition: 0.4s ease;
            opacity: 0;
        }

        .card__play i {
            position: relative;
            z-index: 2;
            margin: 2px 0 0 3px;
        }

        .card__play:before {
            content: "";
            position: absolute;
            display: block;
            width: 48px;
            height: 48px;
            top: 50%;
            left: 50%;
            margin: -24px 0 0 -24px;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            background-color: var(--text-color);
            z-index: 1;
        }

        .card__play:hover {
            background-color: rgba(253, 96, 96, 0.1);
            color: #fd6060;
        }

        .card__content {
            position: relative;
            display: block;
            margin-top: 10px;
            width: 170px !important;
        }

        .card__title {
            font-size: 18px;
            line-height: 30px;
            font-weight: 400;
            color: var(--text-color);
            margin: 0;
            overflow: hidden;
            white-space: nowrap;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            word-wrap: break-word;
        }

        .card__title a {
            color: var(--text-color) !important;
        }

        .card__title a:hover {
            color: var(--text-color);
        }

        .card__category {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -moz-box-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            -webkit-align-items: flex-start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .card__category a {
            font-size: 14px;
            position: relative;
            color: var(--primary-color);
            margin-right: 10px;
            opacity: 0.7;
        }

        .card__category a:after {
            content: ",";
            position: absolute;
            display: block;
            left: 100%;
            top: 0;
            color: var(--primary-color);
        }

        .card__category a:last-child {
            margin-right: 0;
        }

        .card__category a:last-child:after {
            display: none;
        }

        .card__category a:hover {
            opacity: 1;
        }

        /* Videos en arrière plan */
        .card__video {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card__cover {
            position: relative;
            overflow: hidden;
        }

        .card__cover:hover .card__image {
            display: none;
        }

        .card__cover:hover .card__video {
            display: block;
        }

        #album-rotator,
        .carousel-container {
            overflow: hidden;
            position: relative;
            margin: auto;
            margin-bottom: 50px;
        }

        #album-rotator-holder {
            display: flex;
            transition: transform 0.5s ease-out;
            overflow-x: scroll;
        }
    </style>
    <script>
        // Video playing
        document.querySelectorAll('.card__cover').forEach(function(card) {
            card.addEventListener('mouseover', function() {
                var video = card.querySelector('.card__video');
                if (video) {
                    video.play();
                }
            });

            card.addEventListener('mouseout', function() {
                var video = card.querySelector('.card__video');
                if (video) {
                    video.pause();
                    video.currentTime = 0; // Revenir au début de la vidéo
                }
            });
        });

        // paiements
        document.addEventListener('DOMContentLoaded', function() {
            let plans = document.querySelectorAll('.payme');

            plans.forEach(plan => {
                plan.addEventListener('click', function(event) {
                    // Vérifiez si l'utilisateur est connecté
                    let isAuthenticated = this.getAttribute('data-authenticated') === 'true';
                    let isAdmin = this.getAttribute('isadmin');


                    if (!isAuthenticated) {
                        // Afficher l'alerte de connexion
                        let alertElement = document.getElementById('alertNonconected');
                        alertElement.classList.add('alert', 'alert-danger');
                        alertElement.style.display = 'block';

                        setTimeout(() => {
                            alertElement.style.display = 'none';
                        }, 4000);
                        return; // Empêcher l'exécution du paiement
                    }

                    // vérifie si c'est l'admin qui est conneté
                    if (isAdmin) {
                        return; // Empêcher l'exécution du paiement
                    }

                    // Si l'utilisateur est connecté, procédez au paiement
                    let plantype = this.getAttribute('plan');



                    // Préparer les données à envoyer
                    let paymentData = {
                        plantype: plantype,
                    };


                    // Soumettre le formulaire avec une requête fetch
                    fetch('/initpay', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(paymentData)
                        }).then(response => response.json()) // j'attend une réponse en JSON
                        .then(data => {
                            if (data.success) {
                                // alerte d'initialisation de paiement
                                document.getElementById('alertNonconected').style.display =
                                    'block';
                                document.getElementById('alertNonconected').classList.add(
                                    'alert', 'alert-info');
                                document.getElementById('alertNonconected').innerHTML = data
                                    .message;

                                setTimeout(() => {
                                    document.getElementById('alertNonconected').style
                                        .display = 'none';
                                }, 4000); // 4 secondes

                                setTimeout(() => {
                                    window.location.href = data
                                        .checkout_url; // Redirigez vers l'URL de paiement 
                                }, 3000); // 3 secondes

                            } else if (data.error) {
                                // Affichez un message d'erreur si nécessaire
                                document.getElementById('alertNonconected').style.display =
                                    'block';
                                document.getElementById('alertNonconected').classList.add(
                                    'alert', 'alert-info');
                                document.getElementById('alertNonconected').innerHTML = data
                                    .message;

                                setTimeout(() => {
                                    document.getElementById('alertNonconected').style
                                        .display = 'none';
                                }, 4000); // 4 secondes
                            }
                        })
                        .catch(error => {
                            document.getElementById('alertNonconected').style.display = 'block';
                            document.getElementById('alertNonconected').classList.add('alert',
                                'alert-danger');
                            document.getElementById('alertNonconected').innerHTML = error
                                .message;

                            setTimeout(() => {
                                document.getElementById('alertNonconected').style
                                    .display = 'none';
                            }, 4000); // 4 secondes

                        });

                });
            });
        });
        // end paiement

        //Affichage des trois plans d'abonnement
        document.addEventListener('DOMContentLoaded', () => {
            const plans = document.querySelectorAll('.pricing-subscrb .plan');
            const parent = document.querySelector('.pricing-subscrb');

            // Vérifier si tous les plans sont visibles
            const allVisible = Array.from(plans).every(plan => !plan.classList.contains('d-none'));

            if (allVisible) {
                parent.classList.add('show-all-plans');
            } else {
                parent.classList.remove('show-all-plans');
            }
        });
    </script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
</footer>
