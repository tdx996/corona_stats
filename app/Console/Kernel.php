<?php

namespace App\Console;

use App\Console\Commands\CreateReports;
use App\Console\Commands\ImportReportsFromApi;
use App\Console\Commands\ImportReportsFromGov;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        ImportReportsFromApi::class,
        ImportReportsFromGov::class,
        CreateReports::class,
    ];

    protected function schedule(Schedule $schedule) {
//         $schedule->command(CreateReports::class)->everyFifteenMinutes();
    }

    protected function commands() {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
