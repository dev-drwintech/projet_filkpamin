<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\SubscriptionStatusNotification;
use App\Notifications\ExpirationProcheNotification;
use App\Notifications\AbonnementExpireNotification;
use Str;
use Illuminate\Support\Facades\Auth;
use Moneroo\Moneroo;
use Moneroo\MonerooException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\tracking_paiement;

class SslCommerzPaymentController extends Controller
{


    // Initier  le paiement en vérifiant si un abonnement existe déjà
    public function initpay(Request $request)
    {
        $paymentData = $request->plantype;
        $user = $request->user();

        if (!Auth::check()) {
            Log::error('Utilisateur non authentifié', ['user' => $request->all()]);
            return response()->json([
                'error' => 'true',
                'message' => 'NON AUTHENTICATED',
            ], 401);
        }

        // Vérifiez si l'utilisateur a déjà un abonnement actif
        $existingPayments = Payment::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        if ($existingPayments) {
            // Log::warning('Abonnement déjà actif', ['user_id' => $user->id, 'existing_payment_id' => $existingPayments->id]);
            return response()->json([
                'error' => 'true',
                'message' => 'Vous avez déjà un abonnement actif',
            ], 400);
        }

        // Définir la clé secrete API
        $secretKey = config('services.moneroo.secret_key');

        // Définir le montant de paiement pour l'abonnement
        switch ($request->plantype) {
            case 'Basique':
                $amount = 1000;
                break;
            case 'Standard':
                $amount = 1500;
                break;
            case 'Premium':
                $amount = 5000;
                break;
            default:
                Log::error('Type de plan inconnu', ['user_id' => $user->id, 'plantype' => $request->plantype]);
                return response()->json([
                    'error' => 'true',
                    'message' => 'Type de plan inconnu',
                ], 400);
        }


        // verifier si l'utilisateur a un dejà un track_id
        $existingTransaction = tracking_paiement::where('user_id', $user->id)
            ->first();
        if ($existingTransaction) {
            // Log::warning('Transaction déjà existante', ['user_id' => $user->id, 'track_id' => $transactionId]);
            return response()->json([
                'error' => 'true',
                'message' => 'Abonnement déjà existant !',
            ], 400);
        }


        // créer un identifiant de suivi unique pour le paiement
        $transactionId = Str::uuid(); // ou Str::random(32)

        tracking_paiement::create([
            'track_id' => $transactionId,
            'user_id' => $user->id,
            'status' => 'pending',
            'payment_method' => 'moneroo',
            'amount' => $amount,
            'plan' => $request->plantype,
        ]);


        // Appeler l'API Moneroo pour initialiser le paiement
        try {
            $paymentData = [
                'amount' => $amount,
                'currency' => 'XOF',
                'description' => 'Abonnement ' . $request->plantype . ' sur filmkpamin',
                'return_url' => url('/paiementConfigAfter') . '?' . http_build_query([
                    'typeplan' => $request->plantype,
                    'method' => 'moneroo',
                    'amount' => $amount,
                    'track_id' => urlencode($transactionId)
                ]),
                'customer' => [
                    'email' => (string) $user->email,
                    'first_name' => (string) $user->name ?? 'Nom',
                    'last_name' => (string) $user->name ?? 'Prenom',
                ],
                'methods' => [
                    "card_xof",
                    "orange_ci",
                    "mtn_ci",
                    "mtn_bj",
                    "moov_bj",
                    "moov_bf",
                    "orange_sn",
                    "orange_bf",
                    "orange_ml",
                    "moov_tg",
                    "moov_ci",
                    "togocel",
                    "wave_ci",
                    "wave_sn",
                    "freemoney_sn",
                    "airtel_ne",
                ],
            ];

            $monerooPayment = new \Moneroo\Payment($secretKey); // SDK usage
            $payment = $monerooPayment->init($paymentData);

            // Loguer l'URL retournée par Moneroo (avec track_id inclus)
            //   Log::info('Données envoyées à Moneroo', ['return_url' => $paymentData['return_url']]);

            return response()->json([
                'success' => 'true',
                'message' => 'Initialisation du paiement... ',
                'checkout_url' => $payment->checkout_url,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'appel API Moneroo', [
                'user_id' => $user->id,
                'exception' => $e->getMessage(),
            ]);
            return response()->json([
                'error' => 'true',
                'message' => 'Erreur de serveur interne.',
            ], 500);
        }
    }

    // Traitement du paiement && enregistrement dans la  base de donnée
    public function paiementConfigAfter(Request $request)
    {
        // Vérifie que le track_id est bien présent dans l'URL
        $transaction = tracking_paiement::where('track_id', $request->track_id)->first();

        if (!$transaction || !$transaction->user) {
            // Log::error('Utilisateur non trouvé', ['track_paiement_id' => $request->track_id]);
            return redirect()->route('home')->with('error', 'Transaction invalide ou utilisateur non trouvé.');
        }

        $user = $transaction->user;

        // Authentifier manuellement l'utilisateur
        Auth::loginUsingId($transaction->user->id); // connecter
        session()->regenerate(); // sécuriser



        // Vérifier si un abonnement actif existe
        $existingPayments = Payment::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        if ($existingPayments) {
            // Si l'utilisateur a déjà un abonnement actif
            Log::warning('Abonnement déjà actif', ['user_id' => $user->id]);
            return redirect()->route('home')->with('error', 'Vous avez déjà un abonnement actif.');
        }

        // Si le paiement a réussi, traiter la logique d'abonnement
        if ($request->paymentStatus == 'success') {
            $currentDate = Carbon::now();
            $expireDate = $currentDate->addDays(31);

            $payment = Payment::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'transaction_id' => $request->paymentId,
                'PlanAbonnement' => $request->typeplan,
                'status' => 'active',
                'method' => $request->method,
                'renouvellement_date' => $expireDate,
                'expire_date' => $expireDate,
            ]);

            // Met à jour le statut du paiement de la transaction
            $transaction->update(['status' => 'success']);
            Log::info('Abonnement activé pour', ['user_id' => $user->id, 'plan' => $request->typeplan]);

            return redirect()->route('home')->with('success', 'Abonnement ' . $request->typeplan . ' activé avec succès!');
        }

        // Si le paiement échoue
        return redirect()->route('home')->with('error', 'Le paiement est en cours, si échoué vous saurez...');
    }



    public function fall()
    {
        // Implémentez votre logique pour l'échec de paiement ici
    }

    public function renouvellementpay()
    {
        // Implémentez votre logique pour le paiement de renouvellement ici
    }

    public function checkAndRenewSubscriptions()
    {
        $currentDate = Carbon::now();

        // Récupérer tous les paiements dont la date de renouvellement est atteinte ou dépassée
        $payments = Payment::where('expire_date', '<=', $currentDate)->get();

        foreach ($payments as $payment) {
            $user = $payment->user;
            if ($user) {
                // Vérifiez si vous souhaitez renouveler automatiquement ou simplement désactiver l'abonnement
                $renewalSuccessful = $this->processAutomaticRenewal($payment);

                if ($renewalSuccessful) {
                    $payment->status = 'active';
                    $payment->expire_date = $currentDate->addDays(31);
                    $payment->save();
                } else {
                    $payment->status = 'inactive';
                    $payment->save();
                }
            }
        }
    }

    private function processAutomaticRenewal($payment)
    {
        // Implémentez votre logique de renouvellement automatique ici
        // Par exemple, vous pouvez déclencher une nouvelle transaction de paiement
        // Si le paiement est réussi, retournez true, sinon false

        // Simulons un renouvellement réussi
        return true;
    }


    // Envoi des notifications pour les abonnements proches de l'expiration
    public function expirationProcheNotification()
    {
        $abonnements = Payment::whereBetween('expire_date', [
            Carbon::now()->addDays(7)->startOfDay(),
            Carbon::now()->addDays(7)->endOfDay(),
        ])->where('status', 'active')->get();

        foreach ($abonnements as $abonnement) {
            $abonnement->user->notify(new ExpirationProcheNotification($abonnement));
        }
    }

    // Envoi des notifications pour les abonnements expirés
    public function sendExpirationNotification()
    {
        $abonnements = Payment::where('expire_date', '<', Carbon::now())->get();

        foreach ($abonnements as $abonnement) {
            $abonnement->user->notify(new AbonnementExpireNotification($abonnement));
        }
    }
}
