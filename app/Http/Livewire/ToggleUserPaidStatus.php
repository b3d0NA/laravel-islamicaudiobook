<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ToggleUserPaidStatus extends Component
{
    public $user;
    public $isLoading = true;
    protected $listeners = ["prepareUserPaidStatus"];

    public function prepareUserPaidStatus(User $user){
        $this->user = $user;
        $this->isLoading = false;
    }

    public function update(){
        if($this->user->paid_status == 0){
            $this->user->increment('paid_status');
        }else{
            $this->user->decrement('paid_status');
        }
        $this->emit("UserPaidStatusUpdatedSuccessfully", "Alhamdulillah! Paid status updated succesfully");
    }
    
    public function render()
    {
        return view('livewire.toggle-user-paid-status');
    }
}