<?php

namespace App\Console;

use App\Models\Event;
use Carbon\Carbon;
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
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $event_s = Event::where('tanggal_selesai', '<', Carbon::now()->format('Y-m-d'))->where('status', 'active')->get();
            foreach ($event_s as $event) {
                Event::where('id', $event->id)->update([
                    'status' => 'finished',
                ]);
            }
        })->everyMinute();
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
