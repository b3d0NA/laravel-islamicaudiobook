<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class InactiveUsers extends Component
{
    use WithPagination;
    
    public $group_status;
    
    protected $listeners = ["UserUpdatedSuccesfully" => '$refresh', "UserDeletedSuccessfully" => '$refresh', "UserGroupStatusUpdatedSuccessfully" => '$refresh'];


    public function getUsersProperty(){
        return User::where("group_status", "0")
                    ->latest()
                    ->paginate(10);
    }
    public function updateGroupStatus($id){
        $this->emit("prepareUserGroupStatus", User::findOrFail($id));
    }

    public function render()
    {
        return view('livewire.inactive-users');
    }
}
