<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class VideoPublishedNotification extends Notification
{
    use Queueable;

    protected $video;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
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
        //                     ->subject('Nouvelle vidéo mise en ligne')
        //                     ->line('Félicitations ! Votre vidéo' . $this->video->title. 'est maintenant disponible en ligne.')
        //                     ->action('Voir la Vidéo', url('/backend/video/' . $this->video->id))
        //                     ->line('Merci de partager votre contenu avec nous.');

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
            'video_id' => $this->video->id,
            'title' => $this->video->title,
            'message' => 'Félicitations ! Votre vidéo ' .$this->video->title. ' est maintenant disponible en ligne.',
        ];
    }
}
