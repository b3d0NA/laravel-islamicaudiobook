<?php

namespace App\Jobs;

use App\Mail\UserMailer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailActiveUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subject;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::where("group_status", "1")
            ->select("name", "email")
            ->chunk(50, function ($users){
                foreach($users as $user){
                    Mail::to($user->email)
                        ->send(new UserMailer($user, $this->subject, $this->message));
                }
            });
    }
}