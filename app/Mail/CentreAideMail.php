<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class CentreAideMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $prenom;
    public $email;
    public $telephone;
    public $messageContent;

    /**
     * Crée une nouvelle instance du message.
     */
    public function __construct($nom, $prenom, $email, $telephone, $messageContent)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->messageContent = $messageContent;
    }

    /**
     * Construit le message.
     */
    public function build()
    {
        // Pour définir des options de flux SSL, configurez-les dans le fichier de configuration mailer ou lors de la création du transport.

        return $this->from($this->email)
            ->to('abdoubachabikowiyou@gmail.com')
            ->subject('Demande d\'aide')
            ->view('emails.centreaide')
            ->with([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'telephone' => $this->telephone,
                'messageContent' => $this->messageContent,
            ]);
    }
}
