<?php

namespace App\Providers;

use App\Events\VideoCreated;
use App\Events\VideoDeleted;
use App\Events\VideoUpdated;
use App\Listeners\VideoCacheListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Login; // Ajoutez ceci pour l'importer
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendWelcomeNotification; // Ajoutez ceci pour l'importer
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        VideoCreated::class => [
            VideoCacheListener::class
        ],
        VideoUpdated::class => [
            VideoCacheListener::class
        ],
        VideoDeleted::class => [
            VideoCacheListener::class
        ],
        'App\Events\RoleAssigned' => [
            'App\Listeners\CreatePortefeuilleForPartner',
        ],
        //Notification pour expiration proche et expiration
        \App\Events\AbonnementExpiration::class => [
            \App\Listeners\SendAbonnementExpirationNotification::class,
        ],
        \App\Events\AbonnementExpirated::class => [
            \App\Listeners\SendAbonnementExpiratedNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
