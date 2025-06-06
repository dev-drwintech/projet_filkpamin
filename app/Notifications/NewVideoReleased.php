<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\PusherPushNotifications\PusherChannel;
use NotificationChannels\PusherPushNotifications\PusherMessage;

class NewVideoReleased extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Video
     */
    private Video $video;

    /**
     * Create a new notification instance.
     *
     * @param Video $video
     */
    public function __construct(Video $video)
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
        return ['mail', PusherChannel::class];
    }

    public function toPushNotification($notifiable)
    {
        return PusherMessage::create()
            ->android()
            ->badge(1)
            ->sound('success')
            ->title('New '. $this->video->type .' "'. $this->video->title .'" ' . 'released!')
            ->body('Cliquez pour regarder !')
            ->link(route('frontend.videos.show', $this->video->slug));
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Cher utilisateur')
                    ->line('Nouvelle '. $this->video->type .' "'. $this->video->title .'" ' . 'released!')
                    ->action('Cliquez pour regarder', route('frontend.videos.show', $this->video->slug))
                    ->line('Merci d\'utiliser notre application !');
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
            //
        ];
    }
}
