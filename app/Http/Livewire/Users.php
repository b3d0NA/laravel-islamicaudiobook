<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    
    public $search;
    public $gender;
    public $group_status;
    public $paid_status;
    
    protected $listeners = ["UserUpdatedSuccesfully" => '$refresh', "UserDeletedSuccessfully" => '$refresh'];


    public function getUsersProperty(){
        return User::when($this->search >= 2 , function ($query){
                        $this->resetPage();
                        $query->orWhere("name", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("email", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("mobile", 'LIKE', '%' . $this->search . '%');
                        return $query;
                    })
                    ->when($this->gender != "", function ($query){
                        $this->resetPage();
                        return $query->where("gender", $this->gender);
                    })
                    ->when($this->group_status != "", function ($query){
                        $this->resetPage();
                        return $query->where("group_status", $this->group_status);
                    })
                    ->when($this->paid_status != "", function ($query){
                        $this->resetPage();
                        return $query->where("paid_status", $this->paid_status);
                    })
                    ->latest()
                    ->paginate(15);
    }

    public function edit($id){
        $this->emit("prepareUserEdit", User::findOrFail($id));
    }

    public function delete($id){
        $this->emit("prepareUserDelete", User::findOrFail($id));
    }

    public function updateGroupStatus($id){
        $this->emit("prepareUserGroupStatus", User::findOrFail($id));
    }

    public function updatePaidStatus($id){
        $this->emit("prepareUserPaidStatus", User::findOrFail($id));
    }

    public function render()
    {
        return view('livewire.users');
    }
}