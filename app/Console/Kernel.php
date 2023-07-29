<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('cache:clear')->daily();
        // $schedule->command('config:cache')->daily();
        // $schedule->command('route:cache')->daily();
        // $schedule->command('statamic:stache:warm')->daily();
        // $schedule->command('statamic:static:clear')->daily();
        // $schedule->command('statamic:static:warm')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
