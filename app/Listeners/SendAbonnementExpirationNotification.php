<?php

namespace App\Listeners;

use App\Events\AbonnementExpiration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\ExpirationProcheNotification;

class SendAbonnementExpirationNotification
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
     * @param  \App\Events\AbonnementExpiration  $event
     * @return void
     */
    public function handle(AbonnementExpiration $event)
    {
        $event->payment->user->notify(new ExpirationProcheNotification($event->payment));
    }
}
