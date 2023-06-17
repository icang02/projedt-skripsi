<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        \App\Console\Commands\CheckSkripsiDeadline::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:kirim')->daily();
        // $schedule->call(function () {
        //     $response = \Illuminate\Support\Facades\Http::get('http://127.0.0.1:8000/kirim-email'); // Ganti URL dengan URL yang sesuai
        //     // Lakukan sesuatu dengan respons jika diperlukan
        // })->everyMinute();
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
