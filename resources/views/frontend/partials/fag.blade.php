@extends('frontend.layouts.app')
@section('content')
    {{-- bannière --}}
    <section class="banner w-100">
        <h1>FAQ</h1>
    </section>
    <section class="fag-party">
        <div class="faq-section" style="margin-top: 100px;">
            <div class="container  justify-content-center ">
                <h1 style="color: orange; text-align: center;">FAQ- Filmkpamin </h1>
                <div class="content-faq col-md-12">
                    <!-- FAQ 1 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer1')">
                            <span>Qu'est-ce que Filmkpamin ?</span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer1" class="faq-answer col">
                            <p>Filmkpamin est une plateforme de streaming béninoise proposant des contenus média béninois.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer2')">
                            <span>Comment s'inscrire ?</span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer2" class="faq-answer col">
                            <p>Les utilisateurs peuvent s'inscrire directement sur le site en créant un compte. Sur la
                                plateforme, en haut à droite, cliquez sur le bouton "Se connecter". Remplissez le formulaire
                                pour l'inscription et confirmez.</p>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer3')">
                            <span>Quels types de contenus sont disponibles ?</span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer3" class="faq-answer col">
                            <p>La plateforme offre des contenus média locaux en fonction des créateurs africains et des
                                partenaires.</p>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer4')">
                            <span>Y a-t-il des abonnements ?</span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer4" class="faq-answer col">
                            <p>Oui, Filmkpamin propose un plan d’abonnement basique d’un montant mensuel de 1000 FCFA.</p>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer5')">
                            <span>Comment contacter le support ?</span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer5" class="faq-answer col">
                            <p>Les utilisateurs peuvent contacter le service client via le site pour toute assistance.
                                Rejoignez le centre d’aide.</p>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer6')">
                            <span>Est-ce que Filmkpamin est disponible en dehors du Bénin ?</span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer6" class="faq-answer col">
                            <p>Oui, Filmkpamin est accessible dans plusieurs pays. Voir les pays disponibles.</p>
                        </div>
                    </div>




                    <!-- FAQ 7 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer7')">
                            <span>Puis-je télécharger des contenus pour les regarder hors ligne ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer7" class="faq-answer col">
                            <p>Oui, certains contenus peuvent être téléchargés pour une visualisation hors ligne.(2e
                                version)</p>
                        </div>
                    </div>





                    <!-- FAQ 8 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer8')">
                            <span>Quels dispositifs sont compatibles avec Filmkpamin ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer8" class="faq-answer col">
                            <p>Filmkpamin est compatible avec les smartphones, tablettes et téléviseurs intelligents et
                                autres.</p>
                        </div>
                    </div>




                    <!-- FAQ 9 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer9')">
                            <span>Comment annuler mon abonnement ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer9" class="faq-answer col">
                            <p>Les utilisateurs peuvent annuler leur abonnement en se rendant sur leur espace personnel dans
                                le menu abonnement.</p>
                        </div>
                    </div>




                    <!-- FAQ 10 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer10')">
                            <span>Y a-t-il des contenus exclusifs ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer10" class="faq-answer col">
                            <p>Oui, Filmkpamin propose des contenus média béninois.</p>
                        </div>
                    </div>



                    <!-- FAQ 11 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer11')">
                            <span>Y a-t-il une période d'essai gratuite ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer11" class="faq-answer col">
                            <p>Oui, Filmkpamin propose souvent une période d'essai gratuite pour les nouveaux utilisateurs.
                            </p>
                        </div>
                    </div>



                    <!-- FAQ 12 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer12')">
                            <span>Quels genres de contenus sont disponibles ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer12" class="faq-answer col">
                            <p>Filmkpamin offre une variété de contenus, y compris des films, des séries, des documentaires
                                et des animations.</p>
                        </div>
                    </div>





                    <!-- FAQ 13 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer13')">
                            <span>Comment puis-je récupérer mon compte ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer13" class="faq-answer col">
                            <p> Les utilisateurs se rendent sur la page de support en accédant à la page centre d’aide. Ils
                                doivent fournir l’email du compte en spécifiant exactement le problème.</p>
                        </div>
                    </div>




                    <!-- FAQ 14 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer14')">
                            <span>Est-ce que Filmkpamin propose des sous-titres ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer14" class="faq-answer col">
                            <p> Oui, de nombreux contenus incluent des sous-titres uniquement en français.</p>
                        </div>
                    </div>



                    <!-- FAQ 15 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer15')">
                            <span>Comment gérer mes préférences de compte ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer15" class="faq-answer col">
                            <p>Les utilisateurs peuvent gérer leurs préférences dans les paramètres de leur compte, y
                                compris les informations de paiement et les notifications.(2e version)</p>
                        </div>
                    </div>



                    <!-- FAQ 16 -->
                    <div class="faq-item">
                        <button class="faq-question d-flex justify-content-between" onclick="toggleAnswer('answer16')">
                            <span>Comment supprimer mon compte ? </span>
                            <div>
                                <img src="{{ asset('../icon/Vector.png') }}" alt="" id="closeanswers"
                                    style="display: none;">
                                <img src="{{ asset('../icon/Icon.png') }}" id="opendanswers" alt="">
                            </div>
                        </button>
                        <div id="answer16" class="faq-answer col">
                            <p> Les utilisateurs doivent se rendre dans leur espace personnel ensuite dans le menu
                                paramètres. Ils verront le bouton supprimer mon compte.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="ressource/js/fag.js"></script>
@endsection
