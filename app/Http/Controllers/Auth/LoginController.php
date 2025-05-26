<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    // -------------------------Workspace Login Social Network --------------------------------------------------
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $socialUser = Socialite::driver('google')->stateless()->user();
        $pser = $socialUser->getEmail();

        // Vérifier si l'utilisateur existe déjà dans la base de données
        $user = User::where('email', $socialUser->getEmail())->first();
        if (!$user) {
            !
            // Si l'utilisateur n'existe pas, créer un nouvel utilisateur   
            $user = User::create([
                'id' => Str::uuid(), // Générer un UUID
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'email_verified_at' => Carbon::now(),
                'role_id' => DB::table('roles')->where('nom', 'utilisateur')->value('id'), // Attribuer le rôle "utilisateur"
            ]);
        }
        // Connecter l'utilisateur après sa création ou s'il existe déjà
        Auth::login($user);

        // Rediriger vers la route "home"
        return redirect()->route('frontend.user.dashboard', $user->id);
    }



    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        // $user->token;

        $this->_registerOrLoginUser($user);

        return redirect()->route('frontend.user.dashboard', $user->id);
    }

    // -----------------------------------------------------------------------------------------


    // Connexion et vérification d'existance d'un utilisateur
    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        //dd($user);

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->email_verified_at = carbon::now();
            $user->role_id = DB::table('roles')->where('nom', 'utilisateur')->value('id'); // Attribuer le rôle "utilisateur"
            $user->save();
        }

        if ($user) {
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        // dd($user->id);

        Auth::login($user);
        return redirect()->route('frontend.user.dashboard', $user->id);
    }

    /**
     * @param Request $request
     * @param mixed $user
     * @return mixed
     * @throws \Illuminate\Auth\AuthenticationException
     */

    // vérification si l'utilisateur n'est pas bloqué par l'admin
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_blocked) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Votre compte est bloqué. Veuillez contacter <a href="' . route('centreaide') . '">l\'assistance technique</a> via le centre d\'aide.');
        }

        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => $request->ip()
        ]);

        Auth::logoutOtherDevices($request->password);

        $user->tokens()->delete();
    }
}
