<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class VideoReceivedNotification extends Notification
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

        //             ->subject('Nouvelle Vidéo soumise')
        //             ->line('Vous avez reçu une nouvelle vidéo de' . $this->video->user->name. '.')
        //             ->action('Voir la Vidéo', url('/admin/videos_en_attente/' . $this->video->id))
        //             ->line('Merci pour votre attention.');
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
            'user_name' => $this->video->user->name,
            'message' => 'Vous avez reçu une nouvelle vidéo de ' . $this->video->user->name . ' intitulée ' . $this->video->title . '.',
        ];
    }
}
