<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\User;
use App\Models\Newsletter;
use Mail;
use App\Mail\NewsletterSubscription;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    ### Pour l'implémentation de la newsletter
    public function subscribeNewsletter(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
        ]);


        if (Newsletter::where('email', $request->email)->exists()) {
            return response()->json(['success' => false, 'message' => 'Email s\'est déjà abonné à notre newsletter !'], 409);
        }

        Newsletter::create([
            'email' => $request->email,
        ]);

        try {
            Log::info('enregistrer', ['email' => $request->email]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement dans le log', [
                'email' => $request->email,
                'error' => $e->getMessage(),
            ]);
        }


        // ENVOIE DE CONFIRMATION PAR EMAIL
        Mail::to($request->email)->send(new NewsletterSubscription($request->email));

        return response()->json(['success' => true, 'message' => 'Abonné avec succès !'], 200);
    }


    ### Méthode pour la vue de désabonner l'utilisateur de la newsletter
    public function desabonnement()
    {
        return view('errors.unsunscrib');
    }

    ### Méthode pour désabonner l'utilisateur de la newsletter
    public function unsubscribed(Request $request)
    {
        // dd($request->all());
        // valider la requête
        $request->validate([
            'email' => 'required|email',
        ]);

        $newsletter = Newsletter::where('email', $request->email)->first();

        if (!$newsletter) {
            return response()->json(['success' => false, 'message' => 'Email not found!'], 404);
        }

        $newsletter->delete();
        Log::info('supprimer', ['email' => $request->email]);

        return redirect()->to('/')->with('success', 'Vous êtes désabonner avec succès à notre newsletter !');
    }
}
