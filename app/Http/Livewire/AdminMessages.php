<?php

namespace App\Http\Livewire;

use App\Models\AdminMessage;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMessages extends Component
{
    use WithPagination;

    public $search;
    public function getUsersProperty(){
        return  User::has("messages")
                    ->when($this->search >= 2 , function ($query){
                            $this->resetPage();
                            $query->Where("name", 'LIKE', '%' . $this->search . '%');
                            $query->orWhere("email", 'LIKE', '%' . $this->search . '%');
                            $query->orWhere("mobile", 'LIKE', '%' . $this->search . '%');
                            return $query;
                        })
                        ->join('admin_messages', 'admin_messages.user_id', '=', 'users.id')
                        ->select('users.*', 'admin_messages.message as message', 'admin_messages.id as message_id', 'admin_messages.created_at as message_created_at', 'admin_messages.updated_at as message_updated_at', 'admin_messages.user_id as message_user_id')
                        ->orderBy('message_id', "DESC")
                        ->latest()
                        ->groupBy("message_user_id")
                    ->paginate(15);
            
    }

    function mount()
    {
        // dd($this->users);
    }

    public function render()
    {
        return view('livewire.admin-messages');
    }
}