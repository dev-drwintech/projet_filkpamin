<?php

namespace App\Listeners;

use App\Events\RoleAssigned;
use App\Models\Portefeuille;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePortefeuilleForPartner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Vérifier si l'utilisateur a déjà un portefeuille
        $existingPortefeuille = Portefeuille::where('user_id', $event->user->id)->first();

        // Si l'utilisateur n'a pas encore de portefeuille, on en crée un
        if (!$existingPortefeuille && $event->role->nom === 'partenaire') {
            Portefeuille::create([
                'user_id' => $event->user->id,
                'solde' => 0,
                'solde_retire' => 0,
            ]);
        }
    }
}
