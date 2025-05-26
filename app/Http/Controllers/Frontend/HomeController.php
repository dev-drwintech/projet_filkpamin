<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HistoriqueRetrait;
use App\Models\Payment;
use App\Models\Portefeuille;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\SearchQuery;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\parametre_retrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\CentreAideMail;
use Illuminate\Support\Facades\Log;
use App\Notifications\PaymentRequestNotification;
use App\Notifications\EmailVerifiedNotification;
use App\Notifications\AbonnementExpireNotification;
use App\Notifications\ExpirationProcheNotification;
use Carbon\Carbon;
use App\Events\AbonnementExpiration;
use App\Events\AbonnementExpirated;
use Illuminate\Support\Facades\Auth;
use App\Models\VideoCreditView;
use App\Models\coming_videos;

class HomeController extends Controller
{
    public function index()
    {
        $reviews['reviews'] = Review::all();


        // video en tendances
        $videoNotee = Video::where('views', '>=', 1)
            ->select('slug', 'title', 'photos', 'video', 'demo', 'directors', 'description', 'genres', 'type', 'runtime', 'actors', 'status', 'created_at')
            ->get();

        // envoie les infos de l'abonnement
        $user = Auth::user();
        $payments = [];

        if (Auth::check()) {
            // Récupérer les paiements uniquement si un utilisateur est connecté
            $payments = Payment::where('user_id', $user->id)->get();
        }

        $comingVideos = coming_videos::all();


        // Fermeture explicite de la connexion à la base de données
        DB::disconnect();

        return view('frontend.partials._carousel', compact('videoNotee', 'comingVideos','payments'));
    }

    public function userprofil()
    {
        return view('frontend.user.userprofil');
    }

    // footer utilities
    public function centreaide()
    {
        return view('frontend.partials.centreaide');
    }
    public function fag()
    {
        return view('frontend.partials.fag');
    }
    public function about()
    {
        return view('frontend.partials._about');
    }
    public function condition()
    {
        return view('frontend.partials.condition');
    }
    public function politique()
    {
        return view('frontend.partials.politique');
    }
    public function carriere()
    {
        return view('frontend.partials.carriere');
    }
    public function blog()
    {
        return view('frontend.partials.blog');
    }

    // Traiter les données du formulaire et envoyer l'email aux support via le formulaire du centre d'aide
    public function envoyerMessage(Request $request)
    {
        //dd($request->all());
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Créer une instance de la classe Mailable et envoyer l'email
        Mail::send(new CentreAideMail(
            $request->nom,
            $request->prenom,
            $request->email,
            $request->telephone,
            $request->message
        ));

        // Rediriger avec un message de succès
        return redirect()->route('centreaide')->with('success', 'Votre message a été envoyé avec succès !');
    }

    // Partenaire dashboard views
    public function telechargement()
    {
        return view('frontend.partenaire.telechargement');
    }



    // -----------------Methode Ajouter et mise a jour ----------------------------------------------

    public function dashboard($id = null)
    {
        // Récupérer l'utilisateur par ID ou l'utilisateur connecté
        $user = $id ? User::findOrFail($id) : auth()->user();

        // Vérifie si l'utilisateur est connecté, sinon redirige
        if (!$user) {
            return redirect()->route('home')->with('error', 'Utilisateur introuvable.');
        }

        // Récupération du portefeuille et balance
        $portefeuille = Portefeuille::where('user_id', $user->id)->first();
        $balance = $portefeuille ? $portefeuille->solde : 0; // Valeur par défaut : 0 si pas de portefeuille
        $total_remove = $portefeuille ? $portefeuille->solde_retire : 0;

        // Récupérer les vidéos de l'utilisateur
        $videos = Video::where('user_id', $user->id)
            ->select('id', 'slug', 'title', 'photos', 'description', 'genres', 'type', 'status', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        // Récupérer uniquement les notifications de mise en ligne de vidéos
        $notifications = $user->unreadNotifications;
        $unreadCount = $notifications->where('read_at', null)->count();

        // Récupération des paramètres de retrait spécifiques à l'utilisateur
        $parametresRetrait = parametre_retrait::where('user_id', $user->id)->get();

        // Récupérer les vidéos de l'utilisateur
        $HistoriquesdesRetraits = HistoriqueRetrait::with('user', 'parametreRetrait')
            ->where('user_id', $user->id)
            ->select('montant', 'parametre_retraits_id', 'status', 'created_at')
            ->get();

        // Récupérer toutes les vidéos crédiéesz par vue aujourd'hui
        $paiementtoday = VideoCreditView::whereDate('created_at', Carbon::today())
            ->whereIn('video_id', Video::where('user_id', Auth::id())->pluck('id')) // Filtre uniquement les vidéos appartenant au partenaire
            ->orderBy('created_at', 'desc')  // Pour afficher les vues les plus récentes en premier
            ->get();


        // recuperer les videos les plus rentables
        $videosRentables = VideoCreditView::select('video_id', DB::raw('COUNT(*) as credited'))
            ->whereIn('video_id', Video::where('user_id', Auth::id())->pluck('id'))
            ->groupBy('video_id')
            ->having('credited', '>=', 3)
            ->orderByDesc('credited')
            ->limit(6)
            ->with('video') // Charge les détails de la vidéo avec la relation
            ->get();

        // Récupère toutes les vidéos du partenaire
        $totalViews = VideoCreditView::whereIn('video_id', Video::where('user_id', Auth::id())->pluck('id'))->count();
        // Calcul du pourcentage (évite la division par 0)
        $pourcentageRentables = $totalViews > 0 ? ($videosRentables->count() / $totalViews) * 100 : 0;


        // Initialisation des types de paiement requis
        $hasMobileMoney = $parametresRetrait->contains('type_de_paiement', 'Mobile Money');
        $hasMoovMoney = $parametresRetrait->contains('type_de_paiement', 'Moov Money');
        $hasCeltiisCash = $parametresRetrait->contains('type_de_paiement', 'Celtiis Cash');
        $hasBankTransfer = $parametresRetrait->contains('type_de_paiement', 'virement_bancaire');

        // S'assurer que tous les types de paiement nécessaires sont présents dans la vue
        return view('frontend.partenaire.dashboard', compact('HistoriquesdesRetraits', 'user', 'balance', 'total_remove', 'videos', 'notifications', 'unreadCount', 'portefeuille', 'parametresRetrait', 'hasMobileMoney', 'hasMoovMoney', 'hasCeltiisCash', 'hasBankTransfer', 'paiementtoday', 'videosRentables', 'pourcentageRentables'));
    }

    public function parametre()
    {
        // Récupérer tous les paramètres de retrait depuis la base de données
        $parametresRetrait = parametre_retrait::where('user_id', auth()->id())->get();


        // Passer les données à la vue
        return view('frontend.partenaire.parametre', compact('parametresRetrait'));
    }

    public function parametreMobilePaiement(Request $request)
    {
        // Validation des données
        $request->validate([
            'type_de_paiement' => 'required|string',
            'details' => 'required|array',
            'details.numero_compte' => [
                'required',
                'string',
                'regex:/^[0-9]{8,10}$/',
            ],
            'details.nom' => 'required|string|min:4|max:35',
        ], [
            'details.numero_compte.required' => 'Le numéro de compte est requis.',
            'details.numero_compte.regex' => 'Le numéro de compte doit contenir entre 8 et 10 chiffres.',
            'details.nom.required' => 'Le nom est requis.',
            'details.nom.min' => 'Le nom complet doit comporter au moins 4 caractères.',
            'details.nom.max' => 'Le nom complet ne doit pas dépasser 35 caractères.',
        ]);

        // Vérification si le type de paiement existe déjà pour cet utilisateur
        $typeDePaiementExistant = parametre_retrait::where('user_id', $request->input('user_id'))
            ->where('type_de_paiement', $request->input('type_de_paiement'))
            ->exists();

        if ($typeDePaiementExistant) {
            // Retourne un message d'erreur si le type de paiement existe déjà
            return redirect()->back()->withErrors(['type_de_paiement' => 'Cette méthodes de retrait existe déjà.']);
        }

        // Création de l'entrée dans la base de donnée si le type de paiement n'existe pas
        parametre_retrait::create([
            'user_id' => $request->input('user_id'), // Récupère l'ID de l'utilisateur
            'type_de_paiement' => $request->input('type_de_paiement'), // Récupère le type de paiement
            'details' => json_encode($request->input('details')), // Encode les détails en JSON (vu que c'est un tableau qu'on stocke)
        ]);

        return redirect()->back()->with('success', 'Methode de retrait enregistrée avec succès.');
    }


    public function parametreBankPaiement(Request $request)
    {
        // Validation des données
        $request->validate([
            'type_de_paiement' => 'required|string',
            'details' => 'required|array',
            'details.nom_titulaire' => 'required|string|min:4|max:35',
            'details.nom_de_banque' => 'required|string|max:50',
            'details.numero_compte_ou_iban' => [
                'required',
                'string',
                'regex:/^[A-Za-z0-9]{8,34}$/',
            ],
            'details.code_swift_ou_bic' => [
                'required',
                'string',
                'regex:/^[A-Za-z0-9]{8,11}$/',
            ],
            'details.pays' => 'required|string|max:20',
            'details.Adresse_banque' => 'required|string|max:60',
        ], [
            'details.nom_titulaire.required' => 'Le nom du titulaire du compte est requis.',
            'details.nom_titulaire.min' => 'Le nom doit comporter au moins 4 caractères.',
            'details.nom_titulaire.max' => 'Le nom ne doit pas dépasser 35 caractères.',
            'details.nom_de_banque.required' => 'Le nom de la banque est requis.',
            'details.nom_de_banque.max' => 'Le nom de la banque ne doit pas dépasser 50 caractères.',
            'details.numero_compte_ou_iban.required' => 'Le numéro de compte ou IBAN est requis.',
            'details.numero_compte_ou_iban.regex' => 'Le numéro de compte ou IBAN est invalide.',
            'details.code_swift_ou_bic.required' => 'Le code SWIFT/BIC est requis.',
            'details.code_swift_ou_bic.regex' => 'Le code SWIFT/BIC doit contenir entre 8 et 11 caractères.',
            'details.pays.required' => 'Le pays de la banque est requis.',
            'details.Adresse_banque.required' => 'L’adresse de la banque est requise.',
        ]);

        // Vérification si le type de paiement existe déjà pour cet utilisateur
        $typeDePaiementExistant = parametre_retrait::where('user_id', $request->input('user_id'))
            ->where('type_de_paiement', $request->input('type_de_paiement'))
            ->exists();

        if ($typeDePaiementExistant) {
            // Retourne un message d'erreur si le type de paiement existe déjà
            return redirect()->back()->withErrors(['type_de_paiement' => 'Impossible: cette methode de retrait existe déjà']);
        }

        // Création de la nouvelle méthode de paiement
        parametre_retrait::create([
            'user_id' => $request->input('user_id'),
            'type_de_paiement' => $request->input('type_de_paiement'),
            'details' => json_encode($request->input('details')),
            'status' => 'actif',
        ]);

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Vos informations de virement bancaire ont été ajoutées avec succès');
    }



    public function supprimerToutTypePaiement($id)
    {
        // Recherche du paramètre de retrait correspondant à l'ID.
        $parametreRetrait = parametre_retrait::find($id);

        /*Vérifie si le paramètre existe. Si non, un message d'erreur est renvoyé en cas de
        contournement via l'url par des utilisateur malveillant.*/
        if (!$parametreRetrait) {
            return redirect()->back()->with('error', "Suppression impossible: cette methode de retrait n'existe pas");
        }

        // Suppression de l'entrée du type de paiement.
        $parametreRetrait->delete();

        // Redirection avec un message de succès.
        return redirect()->back()->with('success', 'La methode de retrait a été supprimé avec succès');
    }


    public function storeHistorique(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
            'type_de_paiement' => 'required|string|in:Mobile Money,Moov Money,Celtiis Cash,virement_bancaire',
        ]);

        $user = auth()->user();

        // Vérification du montant de retrait minimum
        if ($validatedData['amount'] < 100000) {
            return redirect()->back()->with('error', "Le montant minimum pour un retrait est de 100 000 Fcfa.");
        }

        // Vérification que l'utilisateur a suffisamment de fonds pour effectuer le retrait
        $portefeuille = $user->portefeuille;
        if ($validatedData['amount'] > $portefeuille->solde) {
            return redirect()->back()->with('error', "Vous n'avez pas assez de fonds disponibles pour ce retrait.");
        }

        // Récupérer le paramètre de retrait correspondant
        $parametreRetrait = Parametre_Retrait::where('type_de_paiement', $validatedData['type_de_paiement'])->firstOrFail();

        // Créer l'historique de retrait
        $historiqueRetrait = new HistoriqueRetrait();
        $historiqueRetrait->id = (string) \Str::uuid();
        $historiqueRetrait->portefeuille_id = $portefeuille->id; // Relation avec le portfeuille
        $historiqueRetrait->user_id = $user->id;
        $historiqueRetrait->parametre_retraits_id = $parametreRetrait->id;
        $historiqueRetrait->montant = $validatedData['amount'];
        $historiqueRetrait->status = '0'; // En attente
        $historiqueRetrait->save();

        // Vérification si le statut a changé en '1' (validé)
        if ($historiqueRetrait->status === '1') {
            // Mettre à jour le portefeuille
            $portefeuille = $user->portefeuille;
            $portefeuille->solde_retire += $historiqueRetrait->montant; // Ajouter au montant retiré
            $portefeuille->solde -= $historiqueRetrait->montant; // Soustraire du solde disponible
            $portefeuille->save(); // Sauvegarder les modifications
        }

        //Notification de demande de paiement
        $adminRole = Role::where('nom', 'admin')->first();

        $admin = User::where('role_id', $adminRole->id)->first();

        // Vérifiez que l'admin est bien trouvé
        if ($admin) {
            // Créer les détails pour la notification
            $demande = [
                'user_name' => $historiqueRetrait->user->name,
                'type_de_paiement' => $request->input('type_de_paiement'),
            ];

            // Envoyer la notification
            $admin->notify(new PaymentRequestNotification($demande));
        }

        return redirect()->back()->with('success', "Demande de retrait via {$validatedData['type_de_paiement']} soumise avec succès.");
    }

    // ------------------------------Fin des Methodes -------------------------------------------------


    // User dashboard views
    public function userdashboard($id)
    {
        $user = User::findOrFail($id);
        $uuid = auth()->id();

        if (!$user) {
            return view('frontend.subscription.index');
        }

        //Vérifier les abonnements qui vont expirer dans 7 jours
        $abonnements = Payment::where('expire_date', '>', Carbon::now())
            ->where('expire_date', '<=', Carbon::now()->addDays(7)->endOfDay())
            ->get();

        foreach ($abonnements as $abonnement) {
            $alreadyNotified = $abonnement->user->notifications()
                ->where('type', ExpirationProcheNotification::class)
                ->whereJsonContains('data->payment_id', $abonnement->id)
                ->exists();

            if (!$alreadyNotified) {
                event(new AbonnementExpiration($abonnement)); // Déclenche l'événement pour l'expiration prochaine
            }
        }

        // Vérifier les abonnements expirés
        $expired = Payment::where('expire_date', '<', Carbon::now())->get();

        foreach ($expired as $abonnement) {
            $alreadyNotif = $abonnement->user->notifications()
                ->where('type', AbonnementExpireNotification::class)
                ->whereJsonContains('data->payment_id', $abonnement->id)
                ->exists();

            if (!$alreadyNotif) {
                event(new AbonnementExpirated($abonnement)); // Déclenche l'événement pour l'abonnement expiré
            }
        }

        // Vérification du statut de l'email
        if ($user->email_verified_at != null) {
            // Vérifie si la notification n'a pas déjà été envoyée
            $alreadyNotified = $user->notifications()
                ->where('type', EmailVerifiedNotification::class)
                ->exists();

            if (!$alreadyNotified) {
                $user->notify(new EmailVerifiedNotification($user));
            }
        }

        // Récupérer tous les paiements actifs de l'utilisateur
        $activePayments = Payment::where('user_id', $user->id)->get();

        foreach ($activePayments as $payment) {
            $payment->amount = number_format($payment->amount, 0, '.', ',');
        }

        $tablesugestvideos = Video::where('status', 1)
            ->where('views', '>=', '0')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();

        $Mieuxregardee = Video::where('status', 1)
            ->where('views', '>=', '100')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();

        $notif = $user->unreadNotifications;
        $unreadCounts = $notif->where('read_at', null)->count();

        return view('frontend.user.dashboard', compact('user', 'activePayments', 'tablesugestvideos', 'Mieuxregardee', 'notif', 'unreadCounts'));
    }

    public function abonnementuser()
    {
        $uuid = auth()->id();
        $user = User::where('id', $uuid)->first();

        $activePayments = Payment::where('user_id', $user->id)->get();

        foreach ($activePayments as $payment) {
            $payment->amount = number_format($payment->amount, 0, '.', ',');
        }

        $tablesugestvideos = Video::where('status', 1)
            ->where('views', '>=', '0')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();

        $Mieuxregardee = Video::where('status', 1)
            ->where('views', '>=', '100')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();

        return view('frontend.user.abonnement',  compact('tablesugestvideos', 'Mieuxregardee', 'activePayments'));
    }

    public function usermonprofil($id)
    {
        $user = User::findOrFail($id);

        $sugestvideos = Video::where('status', 1)
            ->where('views', '>=', '100')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();

        $Mieuxregardee = Video::where('status', 1)
            ->where('views', '>=', '100')
            ->select('id', 'slug', 'title', 'type', 'genres', 'poster', 'year', 'views', 'directors', 'actors', 'status', 'country', 'runtime', 'photos', 'demo')
            ->get();
        return view('frontend.user.monprofil',  compact('user', 'sugestvideos', 'Mieuxregardee'));
    }

    public function emailverify()
    {
        return view('auth.verify');
    }
}
