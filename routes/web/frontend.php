<?php

use App\Models\User;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\CommentLikeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NotificationController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\VideoLikeController;
use App\Http\Controllers\PaymentsController;
use App\Http\Middleware\AdminMiddleware;


/**
 * HomeController For Viewing
 * Movie/Series List Without Login
 */

 Route::get('/', [HomeController::class, 'index'])
 ->name('home');



Route::get('/userprofil', [HomeController::class, 'userprofil'])->name('userprofil');

Route::get('/partenaire', [HomeController::class, 'partenaire'])->name('partenaire');

//Template partenaire
Route::get('partenaire/telechargement', [HomeController::class, 'telechargement'])->name('frontend.partenaire.telechargement');





// ----------------------------------Groupe middleware Add  for 2Fa (Authetification a deux facteur)----------------------------------

Route::middleware(['auth', 'check.2fa'])->group(function () {

    // route qui affiche le dashboard Partenaire
    Route::get('partenaire/dashboard/{id}', [HomeController::class, 'dashboard'])->name('frontend.partenaire.dashboard');

    // route qui affiche le dashboard Utilisateur simple
    Route::get('user/dashboard/{id}', [HomeController::class, 'userdashboard'])->name('frontend.user.dashboard');

    // Historique de retrait
    Route::post('/historique-retraits', [HomeController::class, 'storeHistorique'])->name('historique_retraits.store');

    Route::get('partenaire/parametre', [HomeController::class, 'parametre'])->name('frontend.partenaire.parametre');

    // enregistre info Mobile paiement
    Route::post('/partenaire/parametre', [HomeController::class, 'parametreMobilePaiement'])->name('frontend.partenaire.parametreMobile');

    // suprrimer info banque ou Mobile
    Route::delete('/partenaire/parametre/{id}', [HomeController::class, 'supprimerToutTypePaiement'])->name('parametre.supprimer.toutTypePaiement');

    // enregistre info virement banque
    Route::post('/bank-payment', [HomeController::class, 'parametreBankPaiement'])->name('frontend.partenaire.parametreBanqueVirement');

});

// ----------------------------------------------------------------------The end---------------------------------------------------------------







Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');


//Template user
Route::get('user/abonnement', [HomeController::class, 'abonnementuser'])->name('frontend.user.abonnement');

Route::get('user/monprofil/{id}', [HomeController::class, 'usermonprofil'])->name('frontend.user.monprofil');

Route::get('user/user/{id}', [HomeController::class, 'usershow'])->name('frontend.user.show');

Route::get('/selectMovie', [VideoController::class, 'selectMovie'])->name('selectMovie');

// Pour envoyer les mails au support via le formulaire du centre d'aide
Route::post('/centreaide', [HomeController::class, 'envoyerMessage'])->name('envoyerMessage');


// Films
Route::get('/films', [VideoController::class, 'films'])->name('films');

// séries
Route::get('/series', [VideoController::class, 'series'])->name('series');

// Seach 
Route::get('/search', [SearchController::class, 'index'])->name('search.index');



// User block and unblock
Route::put('/users/{id}/block', [UserController::class, 'block'])->name('users.block')->middleware(AdminMiddleware::class);

Route::put('/users/{id}/unblock', [UserController::class, 'unblock'])->name('users.unblock')->middleware(AdminMiddleware::class);

Route::resource('/subs', SubscriptionController::class)->only(['index', 'store']);
Route::resource('/subscriptions', SubscriptionController::class)->only(['index', 'store']);



Route::group(['middleware' => ['auth', 'verified', 'check.2fa'], 'as' => 'frontend.'], function () {
    Route::post('/videos/{video}/like-or-dislike', [VideoLikeController::class, 'likeOrDislike'])
        ->name('videos.like_or_dislike');

    Route::post('/comments/{comment}/like-or-dislike', [CommentLikeController::class, 'commentLikeOrDislike'])
        ->name('comments.like_or_dislike');

    Route::resource('/videos', VideoController::class)
        ->only(['index', 'show']);

    Route::resource('/comments', CommentController::class)
        ->only('index', 'store', 'destroy');


    Route::resource('/reviews', ReviewController::class)
        ->only('store', 'destroy');

    Route::resource('/users', UserController::class)
        ->only('show', 'update');

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications.index');
});
