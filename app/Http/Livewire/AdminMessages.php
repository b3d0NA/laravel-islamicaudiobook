<?php

namespace App\Http\Livewire;

use App\Models\AdminMessage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMessages extends Component
{
    use WithPagination;

    public $search;
    public function getMessagesProperty(){
        return AdminMessage::with(['user' => function ($q){
                        $q->when($this->search >= 2, function($query){
                            $query->where('name', 'LIKE', "%{$this->search}%");
                            $query->orWhere('email', 'LIKE', "%{$this->search}%");
                            $query->orWhere('number', 'LIKE', "%{$this->search}%");
                        });
                    }])
                    ->select('id','is_read', 'user_id', 'message', DB::raw('MAX(created_at) AS created_at'))
                    ->latest()
                    ->groupBy("user_id")
                    ->paginate(15);
            
    }

    public function render()
    {
        return view('livewire.admin-messages');
    }
}