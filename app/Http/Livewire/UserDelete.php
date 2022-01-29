<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserDelete extends Component
{
    public $isLoading = true;
    public $user;
    protected $listeners = ["prepareUserDelete"];

    public function prepareUserDelete(User $user){
        $this->user = $user;
        $this->isLoading = false;
    }

    public function delete(){
        $this->user->delete();
        $this->emit("UserDeletedSuccessfully", "Alhamdulillah! User deleted succesfully");
    }
    
    public function render()
    {
        return view('livewire.user-delete');
    }
}