<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\CommentController;


Route::post('/videos/uploadLargeFiles', [VideoController::class, 'uploadLargeFiles'])->name('videos.uploadLargeFiles');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'role', 'check.2fa']], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::resource('/videos', VideoController::class);

    Route::get('/videos_en_attente', [VideoController::class, 'videosEnAttente'])->name('videos_en_attente.index');

    Route::get('/demande_de_paiement', [VideoController::class, 'demandePaiement'])->name('demande_de_paiement.index');

    Route::get('/demande_de_paiement/accepterRetrait/{id}', [VideoController::class, 'accepterRetrait'])->name('admin.accepterRetrait');

    Route::get('/videos/{id}/voir', [VideoController::class, 'voirVideo'])->name('admin.videos.voir');

    Route::get('/demande_de_paiement/{id}/voir', [VideoController::class, 'voirDemande'])->name('admin.demande.voir');
    
    Route::get('/admin/videos/{id}/voir', [VideoController::class, 'voirVideo_admin'])->name('admin.voirVideos');

    Route::get('/video_en_attente/approuverVideo/{id}', [VideoController::class, 'approuverVideo'])->name('admin.approuverVideo');

    Route::resource('/videos_category', VideoCategoryController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/comments', CommentController::class);

    Route::resource('/reviews', ReviewController::class);
});

Route::post('/store_partenaire', [VideoController::class, 'store_partenaire'])->name('videos.store_partenaire');

//Route pour suppression de compte et abonnement 
Route::delete('/delete-account', [UserController::class, 'deleteAccount'])->name('user.deleteAccount');