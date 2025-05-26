<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTwoFactor
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Si l'utilisateur a activé la 2FA et n'a pas encore vérifié sa session
        if ($user && $user->auth && !session('2fa_verified')) {
            // Si l'utilisateur vient de se connecter, enregistrer l'URL de destination
            if (!$request->is('2fa/verify')) {
                session(['from_login' => true]); // Marquer la session comme issue d'une connexion
                // Enregistrer l'URL à laquelle l'utilisateur tentait d'accéder
                session(['url.intended' => url()->current()]);
                return redirect()->route('verifyModal.2fa');
            }
        }

        return $next($request);
    }
}
