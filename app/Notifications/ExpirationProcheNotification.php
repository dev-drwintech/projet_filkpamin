<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpirationProcheNotification extends Notification
{
    use Queueable;

    protected $abonnement;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($abonnement)
    {
        $this->abonnement = $abonnement;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {   
        return [
            'type' => 'expiration',
            'payment_id' => $this->abonnement->id, 
            'status' => $this->abonnement->status,
            'date_renouvellement' => $this->abonnement->renouvellement_date,
            'date_expiration' => $this->abonnement->expire_date,
            'message' => 'Votre abonnement actuel expire dans 7 jours. Pensez à le renouveler dès maintenant.',
        ];
    }
}
