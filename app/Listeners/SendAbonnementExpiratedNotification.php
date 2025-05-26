<?php

namespace App\Listeners;

use App\Events\AbonnementExpirated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\AbonnementExpireNotification;

class SendAbonnementExpiratedNotification
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
     * @param  \App\Events\AbonnementExpirated  $event
     * @return void
     */
    public function handle(AbonnementExpirated $event)
    {
        $event->payment->user->notify(new AbonnementExpireNotification($event->payment));
    }
}
