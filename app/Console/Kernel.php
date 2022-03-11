<?php

namespace App\Console;

use App\Models\BookRequest;
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
            $books = BookRequest::where("status", 2)
                ->where("updated_at", ">", now()->subMonth())
                ->get();
            foreach ($books as $book) {
                if ($book->updated_at->lessThan(now()->subDays($book->expiration))) {
                    $book->update(["is_expired" => 1]);
                }
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