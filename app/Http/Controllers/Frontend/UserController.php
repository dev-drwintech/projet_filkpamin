<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Payment;
use App\Models\Video;
use PragmaRX\Google2FAQRCode\Google2FA;


class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // ---------------------------------------------------Zone de la 2Fa -------------------------------------------------------

public function monProfil($id)
{
    $user = User::findOrFail($id);
    return view('frontend.user.monprofil', compact('user'));
}

// NB: C'est dans cette methode que je passe les données qui genère le "QR-code" et la "clé-secrète" a la vue Monprofil


public function showProfile($id)
{
    // Récupérer l'utilisateur par son ID
    $user = User::findOrFail($id);

    // Récupérer les vidéos suggérées
    $tablesugestvideos = Video::where('suggested', true)->get();

    // Récupérer les vidéos les plus regardées
    $Mieuxregardee = Video::orderBy('views', 'desc')->take(5)->get(); // Exemple, en supposant qu'il y a une colonne 'views' pour les vues

    // Vérifier si l'utilisateur est authentifié et récupérer les notifications non lues
    if (auth()->check()) {
        $unreadNotificationsCount = auth()->user()->unreadNotifications->count();
    } else {
        $unreadNotificationsCount = 0;
    }

    // Générer la clé secrète et le QR Code pour l'authentification 2FA
    $google2fa = new Google2FA();
    
    // Ne générer une nouvelle clé que si l'utilisateur n'a pas déjà de clé 2FA
    $secretKey = $user->google2fa_secret ?? $google2fa->generateSecretKey();

    $QR_Image = $google2fa->getQRCodeInline(
        config('app.name'),  // Nom de l'application
        $user->email,        // Email de l'utilisateur
        $secretKey           // Clé secrète générée ou existante
    );

    // Passer les variables à la vue
    return view('frontend.user.monprofil', compact(
        'user',
        'unreadNotificationsCount',
        'tablesugestvideos',
        'Mieuxregardee',
        'QR_Image',
        'secretKey'
    ));
}

// --------------------------------------------------Fin de la zone -------------------------------------------------------------------





public function markNotificationsAsRead(Request $request)
{
    $user = Auth::user();
    
    // Marquer les notifications comme lues
    $user->unreadNotifications->markAsRead();

    // Retourner le nombre de notifications non lues restantes
    return response()->json([
        'success' => true,
        'unreadNotificationsCount' => $user->unreadNotifications->count()
    ]);
}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        //        return $request->all();

        $validator = Validator::make($request->only('name', 'email', 'old_password', 'password', 'password_confirmation'), [
            'name' => 'sometimes|regex:/(^([a-zA-z ]+)(\d+)?$)/u|min:5',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'old_password' => 'sometimes|min:8',
            'password' => 'sometimes|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->hasAny(['old_password', 'password'])) {
            $credentials = [
                'email' => auth()->user()->email,
                'password' => $request['old_password']
            ];
            if (auth()->attempt($credentials)) {
                $request->merge(['password' => bcrypt($request['password'])]);
            } else {
                return redirect()->back()->with('error', "L'ancien mot de passe ne correspond pas." )->withInput();
            }
        }

        try {
            if (auth()->user()->id == $id) {
                $user->update($request->only('name', 'email', 'password'));

                return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
            }

            return redirect()->back()->with('error', "Vous n'êtes pas autorisé à effectuer cette mise à jour." );

        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Une erreur est survenue : " . $e->getMessage() );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Block users
    public function block($id)
    {
        $user = User::findOrFail($id);

        // Vérifier si l'utilisateur est déjà bloqué
        if ($user->is_blocked) {
            session()->flash('message', 'Le compte utilisateur est déjà bloqué.');
            session()->flash('type', 'info');
            return redirect()->route('users.index');
        }

        // Bloquer l'utilisateur
        $user->is_blocked = true;
        $user->save();

        // Déconnecter l'utilisateur s'il est actuellement connecté
        if (Auth::check() && Auth::user()->id == $id) {
            Auth::logout();
            session()->flash('message', 'Votre compte a été bloqué. Vous avez été déconnecté.');
            session()->flash('type', 'danger');
            return redirect()->route('login');
        }

        session()->flash('message', 'Le compte utilisateur a été bloqué avec succès.');
        session()->flash('type', 'success');
        return redirect()->route('users.index');
    }


    //unblock users
    public function unblock($id)
    {
        $user = User::findOrFail($id);

        // Vérifier si l'utilisateur est déjà débloqué
        if (!$user->is_blocked) {
            session()->flash('message', "Le compte utilisateur n'est pas bloqué !");
            session()->flash('type', 'info');
            return redirect()->route('users.index');
        }

        // Débloquer l'utilisateur
        $user->is_blocked = false;
        $user->save();

        session()->flash('message', 'Le compte utilisateur a été débloqué avec succès.');
        session()->flash('type', 'success');
        return redirect()->route('users.index');
    }
}
