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
    public $filter;
    
    protected $listeners = ["UserUpdatedSuccesfully" => '$refresh', "UserDeletedSuccessfully" => '$refresh'];

    protected $queryString = ['search', "gender", "group_status", "paid_status", "filter"];

    public function getUsersProperty(){
        return User::when($this->search >= 2 , function ($query){
                        $query->orWhere("name", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("email", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("mobile", 'LIKE', '%' . $this->search . '%');
                        return $query;
                    })
                    ->when($this->gender != "", function ($query){
                        return $query->where("gender", $this->gender);
                    })
                    ->when($this->filter == 1, function ($query){
                        return $query->whereDate('last_login_at', '<', now()->subDays(30))
                                    ->orWhereNull("last_login_at");
                    })
                    ->when($this->group_status != "", function ($query){
                        return $query->where("group_status", $this->group_status);
                    })
                    ->when($this->paid_status != "", function ($query){
                        return $query->where("paid_status", $this->paid_status);
                    })
                    ->latest()
                    ->paginate(15);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function updatedGender(){
        $this->resetPage();
    }

    public function updatedFilter(){
        $this->resetPage();
    }
    public function updatedGroupStatus(){
        $this->resetPage();
    }
    public function updatedPaidStatus(){
        $this->resetPage();
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