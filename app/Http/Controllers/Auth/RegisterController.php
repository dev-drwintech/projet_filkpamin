<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'regex:/(^([a-zA-Z ]+)(\d+)?$)/u', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'regex:/(^([a-zA-Z@€]+)(\d+)?$)/u','min:8', 'confirmed'],
            'policy' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        // Récupérer l'URL de l'avatar Gravatar
        $grav_url = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($data['email']))) . '?d=robohash';

        // Récupérer le rôle par défaut "utilisateur"
        $defaultRole = Role::where('nom', 'utilisateur')->first();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $grav_url,
            'role_id' => $defaultRole->id, // Attribuer le rôle par défaut
        ]);
    }
}
