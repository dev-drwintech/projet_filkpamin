<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use PragmaRX\Google2FA\Google2FA;
use PragmaRX\Google2FAQRCode\Google2FA;


class TwoFactorAuthController extends Controller
{
    protected $google2fa;

    // Permet d'injecter une instance de Google2FA pour gérer les opérations liées à l'authentification à deux facteurs.
    //L'injection de dépendances facilite la réutilisation et le test du code.
    public function __construct(Google2FA $google2fa)
    {
        $this->google2fa = $google2fa;
    }


    // Vue pour retrer le code a 6 chiffre après connexion de l'utilisateur
    public function modalVerifyAuthenticator()
    {
        return view('auth.google2fa.index');
    }


    // Méthode pour vérifier le code 2FA apres la connexion de l'utilisateur

    public function verify(Request $request)
    {
        $request->validate([
            'google_auth_code' => 'required|numeric|digits:6'
        ]);

        $user = Auth::user();

        // Vérifier le code 2FA
        $valid = $this->google2fa->verifyKey($user->google2fa_secret, $request->google_auth_code);

        if ($valid) {
            // Marquer la session comme vérifiée
            session(['2fa_verified' => true]);

            // Vérifier si l'utilisateur vient de se connecter
            if (session()->has('from_login')) {
                session()->forget('from_login'); // Nettoyer la session
                return redirect()->intended()->with('success', 'Code vérifié avec succès.');
            }
        }
        // Utiliser 'error' comme clé pour les notifications
        return back()->with('error', 'Code invalide. Veuillez réessayer.');
    }




    // Méthode pour activer la 2FA depuis l'input du back-office (Mon profil)
    public function enable(Request $request)
    {
        $request->validate([
            'google_auth_code' => 'required|numeric|digits:6',
            'secret_key' => 'required|string',
        ]);

        $user = Auth::user();
        $secretKey = $request->input('secret_key');

        // Vérifier le code 2FA
        $valid = $this->google2fa->verifyKey($secretKey, $request->input('google_auth_code'));

        if ($valid) {
            // Enregistrer la clé secrète et activer la 2FA
            $user->google2fa_secret = $secretKey;
            $user->auth = true;
            $user->save();

            return redirect()->back()->with('success', 'Authentification à deux facteurs activée avec succès.');
        }

        // Retourner avec une clé générique 'error' pour afficher la notification
        return back()->with('error', 'Code invalide. Impossible d\'activer la 2FA.');
    }


    // Méthode pour désactiver la 2FA depuis l'input du back-office (Mon profil) via le boutton rouge
    public function disable()
    {
        $user = Auth::user();
        $user->google2fa_secret = null;
        $user->auth = false;
        $user->save();

        return redirect()->back()->with('success', 'Authentification à deux facteurs désactivée.');
    }
}
