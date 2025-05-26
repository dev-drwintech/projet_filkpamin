<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentRequestNotification extends Notification
{
    use Queueable;

    protected $demande;

    /**
     * Création d'une nouvelle instance de notification.
     *
     * @return void
     */ 
    public function __construct($demande)
    {
        $this->demande = $demande;
    }

    /**
     * Détermine les canaux de livraison de la notification.
     *
     * @param mixed $notifiable - L'entité qui recevra la notification.
     * @return array - On utilise ici uniquement le canal 'database'.
     */
    public function via($notifiable)
    {
        return ['database']; // Notification enregistrée uniquement en base de données.
    }

    /**
     * Retourne les données de la notification sous forme de tableau.
     *
     * @param mixed $notifiable - L'entité qui recevra la notification.
     * @return array - Les données à enregistrer en base de données.
     */


    public function toArray($notifiable)
    {
        $typeDePaiement = $this->demande['type_de_paiement'] ?? 'inconnu';

        // Préparer les données communes
        $data = [
        'type_de_paiement' => $typeDePaiement, // Méthode de paiement
        'message' => 'Vous avez reçu une demande de paiement par ' .$typeDePaiement. ' du partenaire ' .$this->demande['user_name']. '.',
        ];

        // Ajouter les détails spécifiques selon le type de paiement
        if ($typeDePaiement === 'virement_bancaire') {
            $data['nom'] = $this->demande['details']['nom_titulaire'] ?? 'Non spécifié';
            $data['numero_compte'] = $this->detailsdemande['details']['numero_compte_ou_iban'] ?? 'Non spécifié';
            $data['nom_banque'] = $this->demande['details']['nom_de_banque'] ?? 'Non spécifié';
        } else {
            $data['nom'] = $this->demande['details']['nom'] ?? 'Non spécifié';
            $data['numero_compte'] = $this->demande['details']['numero_compte'] ?? 'Non spécifié';
        }

        return $data;
    }
 }  