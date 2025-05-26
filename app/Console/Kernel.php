<?php

namespace App\Console;

use App\Console\Commands\EmailInactiveUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        EmailInactiveUsers::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:inactive-users')
            ->dailyAt('22:00')
            ->withoutOverlapping();
        $schedule->command('queue:work --tries=3')
            ->cron('* * * * *')
            ->withoutOverlapping();
        // Ajoute le nettoyage du cache toutes les minutes
        $schedule->command('cache:clear')->everyMinute()->withoutOverlapping();
        DB::disconnect(); // Fermeture de la connexion après l'exécution de la commande


        DB::disconnect(); // Fermeture de la connexion après l'exécution de la commande
        $schedule->command('telescope:prune')->daily();

        DB::disconnect(); // Fermeture de la connexion après l'exécution de la commande
        // Ajoute l'optimisation  toutes les heures
        $schedule->command('optimize')->hourly()->withoutOverlapping();

        //ajout pour nettoyer le cache des routes tout les jours
        $schedule->command('route:cache')->daily()->withoutOverlapping();

        //ajout pour nettoyer le cache de config tout les jours
        $schedule->command('config:cache')->daily()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
