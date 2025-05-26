<footer class="footer pb-5">
    <div class="container">
        <div class="newsletter">
            <h2>ABONNEZ-VOUS À NOTRE NEWSLETTER</h2>
            <div id="alertenewsletter" style="display: none; width: 250px !important; margin: 0 auto;"></div>
            <div class="newsletter-form">
                <form>
                    @csrf
                    <input type="email" placeholder="Votre e-mail">
                    <button type="submit">S'ABONNER</button>
                </form>
            </div>
        </div>
        <div class="footer-content mt-5 mb-5">
            <div class="brand-section mx-5">
                <div class="logo mb-1 mt-0">
                    <a href="{{ route('home') }}"><img src="{{ asset('../assets/img/logo.png') }}" alt="filmkpamin"></a>
                </div>
                <div class="social-icons mt-4">
                    <a href="#" class="socialIcon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="socialIcon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="socialIcon">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="socialIcon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="links-section mt-1">
                <div class="useless">
                    <div class="d-flex justify-content-center flex-column mx-5">
                        <h3>Films & Séries</h3>
                        <div class="d-flex justify-content-between ">
                            <ul class="mx-2">
                                <li><a href="">Drame </a></li>
                                <li><a href="">Famille </a></li>
                                <li><a href="">Réalité </a></li>
                                <li><a href="">Comédie </a></li>
                            </ul>
                            <ul class="mx-2">
                                <li><a href="">Action</li>
                                <li><a href="">Horreur</li>
                                <li><a href="">Romance</li>
                                <li><a href="">Enfants</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <h3>Soutien</h3>
                    <ul>
                        <li><a href="{{ route('centreaide') }}">Centre d'aide</a></li>
                        <li><a href="{{ route('fag') }}">FAQ</a></li>
                        @if (auth()->check())
                            <li><a href="{{ route('frontend.user.dashboard', auth()->user()->id) }}">Mon compte</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Mon compte</a></li>
                        @endif

                    </ul>
                </div>
                <div class="mt-1">
                    <h3>À propos de FilmKpamin</h3>
                    <ul>
                        <li><a href="{{ route('about') }}">À propos de nous</a></li>
                        <li><a href="{{ route('carriere') }}">Carrières</a></li>
                        <li><a href="{{ route('blog') }}">Actualités et articles</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between text-light footfoot mt-5 ">
            <p><a href="{{ route('condition') }}" class="mx-3">Conditions d'utilisation</a> <a
                    href="{{ route('politique') }}" class="mx-3">Politique
                    de confidentialité</a>
            </p>
            <p>&copy; 2024 FilmKpamin, Tous droits réservés.</p>
        </div>
        <div class="footer-bottom mb-5">
            <div></div>
        </div>
    </div>
</footer>
<script>
    document.querySelector('.newsletter-form form').addEventListener('submit', function(e) {
        e.preventDefault();

        const emailInput = this.querySelector('input[type="email"]');
        const email = emailInput.value;
        const csrfToken = document.querySelector('input[name="_token"]').value;
        const alertDiv = document.getElementById('alertenewsletter');

        fetch('/subscribeNews', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    email
                })
            })
            .then(response => response.json())
            .then(data => {
                alertDiv.style.display = 'block';

                if (data.success) {
                    alertDiv.textContent = data.message || 'Inscription réussie !';
                    alertDiv.style.color = '#479f76';
                    setTimeout(() => {
                        alertDiv.style.display = 'none';
                    }, 3000);
                } else {
                    alertDiv.textContent = data.message || 'Erreur lors de l\'inscription.';
                    alertDiv.style.color = '#e35d6a';

                    setTimeout(() => {
                        alertDiv.style.display = 'none';
                    }, 3000);
                }

                emailInput.value = '';
            })
            .catch(error => {
                alertDiv.style.display = 'block';
                alertDiv.textContent = 'Erreur réseau. Veuillez réessayer.';
                alertDiv.style.color = '#e35d6a';

                console.error('Erreur lors de l\'envoi de la requête :', error);
                setTimeout(() => {
                    alertDiv.style.display = 'none';
                }, 3000);
            });
    });
</script>
