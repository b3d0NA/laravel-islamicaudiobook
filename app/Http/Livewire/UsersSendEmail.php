<?php

namespace App\Http\Livewire;

use App\Jobs\MailActiveUsersJob;
use App\Jobs\MailInactiveUsersJob;
use App\Jobs\MailPaidUsersJob;
use App\Mail\MailActiveUsers;
use App\Mail\MailInactiveUsers;
use App\Mail\UserMailer;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UsersSendEmail extends Component
{
    public $emails;
    public $subject;
    public int $type = 0 ;
    public $message;

    public function send(){
        if($this->type === 0){
            $this->mailInactiveUsers();
        }else if($this->type === 1){
            $this->mailActiveUsers();
        }else if($this->type === 2){
            $this->mailPaidUsers();
        }else if($this->type === 3){
            $this->mailIndividuals();
        }
        $this->resetExcept("");
        $this->emit("MailSentUser", "In Shaa Allah! Mail will be sent to all users");
    }

    private function mailInactiveUsers(){
        $job = (new MailInactiveUsersJob($this->subject, $this->message))
                    ->delay(now()->addSeconds(2));
        dispatch($job);
    }
    
    public function mailActiveUsers(){
        $job = (new MailActiveUsersJob($this->subject, $this->message))
                    ->delay(now()->addSeconds(2));
        dispatch($job);
    }

    public function mailPaidUsers(){
        $job = (new MailPaidUsersJob($this->subject, $this->message))
                    ->delay(now()->addSeconds(2));
        dispatch($job);
    }
    
    public function mailIndividuals(){
        $emails = explode(",", $this->emails);
        foreach($emails as $email){
            $user = User::where("email", trim($email))->first();
            if($user){
                Mail::to($user->email)
                    ->send(new UserMailer($user, $this->subject, $this->message));
            }else{
                $this->addError("mailerror", "SubhanAllah! {$email} email is not registered here.");
            }
        }
    }
    
    public function render()
    {
        return view('livewire.users-send-email');
    }
}