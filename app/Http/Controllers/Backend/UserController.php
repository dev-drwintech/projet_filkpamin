<?php

namespace App\Http\Controllers\Backend;

use App\Events\RoleAssigned;
use App\Models\Portefeuille;
use App\Models\Role;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::latest('id')->with('role')->paginate();
        return view('backend.user.index', $data);
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.user.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'name' => 'required|min:5',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);


        // database update
        $user = User::findOrFail($id);

        if ($user == auth()->user()) {
            $user->update($request->only('name'));

            session()->flash('message', 'Nom mise à jour avec succès !');
            session()->flash('type', 'success');
            return redirect()->route('users.index');
        }


        $user->name = $request->name; // Mettre à jour le nom
        $user->email = $request->email; // Mettre à jour l'email
        $role = Role::findOrFail($request->role);
        // Vérifie si le rôle est "partenaire" et déclenche l'événement
        $user->role()->associate($role);
        $user->save();

        // Déclenche l'événement RoleAssigned
        event(new RoleAssigned($user, $role));

        // redirect
        session()->flash('message', 'Utilisateur mise à jour avec succès !');
        session()->flash('type', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user == auth()->user()) {
            session()->flash('message', 'Vous ne pouvez pas supprimer votre propre compte !');
            session()->flash('type', 'danger');
            return back();
        }

        $user->delete();

        session()->flash('message', 'Utilisateur supprimé !');
        session()->flash('type', 'success');

        return back();
    }

    public function deleteAccount()
    {
        $user = auth()->user();

        if ($user) {
            // Supprime tous les paiements liés
            if ($user->payments()->exists()) {
                $user->payments()->delete();
            }

            // Supprime l'utilisateur
            $user->delete();

            // Déconnecte l'utilisateur
            auth()->logout();

            return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
        }

    }
    
}