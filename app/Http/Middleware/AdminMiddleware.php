<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est un administrateur
        if ($request->user()->isAdmin()) {
            return $next($request);
        }

        // Si l'utilisateur n'est pas un administrateur, redirige-le ou retourne une erreur 403
        abort(403, 'Action interdite !');
    }
}
