<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ToggleUserGroupStatus extends Component
{
    public $user;
    public $isLoading = true;
    protected $listeners = ["prepareUserGroupStatus"];

    public function prepareUserGroupStatus(User $user){
        $this->user = $user;
        $this->isLoading = false;
    }

    public function update(){
        if($this->user->group_status == 0){
            $this->user->increment('group_status');
        }else{
            $this->user->decrement('group_status');
        }
        $this->emit("UserGroupStatusUpdatedSuccessfully", "Alhamdulillah! Group status updated succesfully");
    }

    public function render()
    {
        return view('livewire.toggle-user-group-status');
    }
}