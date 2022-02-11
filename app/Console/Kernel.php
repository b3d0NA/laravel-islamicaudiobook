<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
            $inactivePaidUsers = User::with(['payments' => function ($q){
                                    $q->whereDate('created_at', '>' ,now()->subDays(30));
                                }])
                                ->where('paid_status', 1)
                                ->get();
            foreach($inactivePaidUsers as $user){
                if(!$user->payments->first()){
                    $user->update(["paid_status" => 0]);
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
