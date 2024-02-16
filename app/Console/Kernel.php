<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\TransferLibere;
use App\Console\Commands\TransferCondamner;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('transferlibere'); // Exécutez la commande tous les jours
        $schedule->command('transferCondamner'); // Exécutez la commande tous les jours
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     * 
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    
}
