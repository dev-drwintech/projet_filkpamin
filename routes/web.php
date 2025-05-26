<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\TwoFactorAuthController;
use App\Http\Controllers\NewsletterController;

require __DIR__ . '/web/frontend.php';
require __DIR__ . '/web/backend.php';




Route::post('/mark-notifications-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['success' => true]);
});


/**
 * About Us Page
 */


Route::post('/mark-notifications-as-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['status' => 'Notifications marquées comme lues']);
})->middleware('auth');


// Login/Signup Routes 
Auth::routes(['verify' => true]);




// -----------------Implémentation de l'Auth va Facebook et Google---------------------------

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// ----------------------------------------------------Fin-----------------------------------------------------------------------





Route::post('file-upload/upload-large-files', [VideoController::class, 'uploadLargeFiles'])->name('files.upload.large');

/**
 * SSLCOMMERZ
 */
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::post('/store', [SslCommerzPaymentController::class, 'store'])
        ->name('store');

    Route::post('/initpay', [SslCommerzPaymentController::class, 'initpay'])->name('initpay'); // initialisation du paiement 
    Route::get('/successpay/{paymentId}', [SslCommerzPaymentController::class, 'showSuccessPage'])->name('successpay');
    Route::get('/abonne', [SslCommerzPaymentController::class, 'showSuccessPage'])->name('abonne');

    // Route::get('/abonneRedirect', [SslCommerzPaymentController::class, 'abonneRedirect'])->name('abonneRedirect');

    Route::get('/fail', [SslCommerzPaymentController::class, 'fail'])->name('fail');

    Route::get('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('cancel');

    Route::post('/renouvellementpay', [SslCommerzPaymentController::class, 'renouvellementpay'])->name('renouvellementpay');
});

//Routes politique , fag ,about , centre aide , condition d'utilisation
Route::get('/centreaide', [HomeController::class, 'centreaide'])->name('centreaide');
Route::get('/fag', [HomeController::class, 'fag'])->name('fag');
Route::get('/politique', [HomeController::class, 'politique'])->name('politique');
Route::get('/condition', [HomeController::class, 'condition'])->name('condition');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/carriere', [HomeController::class, 'carriere'])->name('carriere');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::post('/subscribeNews', [NewsletterController::class, "subscribeNewsletter"])->name('subscribeNews');
Route::get('desabonnement', [NewsletterController::class, 'desabonnement'])->name('desabonnement');
Route::post('unsubscribed', [NewsletterController::class, 'unsubscribed'])->name('unsubscribed');


// Auth non verify email middleware
Route::middleware(['auth', 'check.2fa'])->group(function () {

    Route::get('emailverify', [HomeController::class, 'emailverify'])->name('emailverify');

    // Routes pour les utilisateurs
    Route::prefix('user')->name('frontend.user.')->group(function () {
        Route::get('/monprofil/{id}', [UserController::class, 'showProfile'])->name('monprofil');
    });

    Route::post('/notifications/read', [UserController::class, 'markNotificationsAsRead'])->name('notifications.markAsRead');

    Route::get('/monprofil/{id}', [UserController::class, 'monProfil'])->name('frontend.user.monprofil');
    Route::get('/notify-expiry', [SslCommerzPaymentController::class, 'notifyUserOfSubscriptionExpiry'])
        ->name('notify.expiry');

    Route::get('/send-notification/{userId}', [NotificationController::class, 'sendNotification']);


    Route::get('/user/monprofil/{id}', [UserController::class, 'showProfile'])->name('frontend.user.monprofil');

    Route::get('/user/monprofil/{id}', [UserController::class, 'showProfile'])->name('user.profile');

    Route::get('/notifications', [NotificationController::class, 'index']);

    Route::middleware('auth:sanctum')->get('/notifications', [NotificationController::class, 'index']);

    Route::get('/notifications', [NotificationController::class, 'index'])->name('frontend.notifications.index');

    Route::post('/send-test-notification', [NotificationController::class, 'sendTestNotification']);

    Route::post('/notifications/markAsRead', [NotificationController::class, 'markAsRead'])->name('notifications.Read');

    Route::get('/monprofil/{id}', [UserController::class, 'showProfile'])->name('frontend.user.monprofil');

    Route::get('/user/monprofil/{id}', [UserController::class, 'showProfile'])->name('user.profile');

    // les route de 2fa
    Route::get('/2fa/verify', [TwoFactorAuthController::class, 'modalVerifyAuthenticator'])->name('verifyModal.2fa');
    Route::post('/2fa/verify', [TwoFactorAuthController::class, 'verify'])->name('2fa.verify.post');
    Route::post('/2fa/enable', [TwoFactorAuthController::class, 'enable'])->name('2fa.enable');
    Route::post('/2fa/disable', [TwoFactorAuthController::class, 'disable'])->name('2fa.disable');
});

// partenaire calcule revenus 
Route::post('/partner-revenue', [VideoController::class, 'partnerRevenue'])->name('partnerrevenue');

Route::middleware(['web'])->group(function () {
    // paiement congfiguration
    Route::get('/paiementConfigAfter', [SslCommerzPaymentController::class, 'paiementConfigAfter'])->name('paiementConfigAfter'); // taitement du paiement 
});

route::get('maintenance', function () {
    return view('frontend.partials.maintenance');
})->name('maintenance');
