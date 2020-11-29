<?php

namespace IRaven\IHub\Infra\Console;

use Illuminate\Console\Scheduling\Schedule;

class Kernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }
}
