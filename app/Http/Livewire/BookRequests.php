<?php

namespace App\Http\Livewire;

use App\Models\BookRequest;
use App\Models\User;
use Livewire\Component;

class BookRequests extends Component
{
    public $filter;
    public $search;

    protected $listeners = ['BookRequestApprovedSuccesfully' => '$refresh', 'BookRequestDeclinedSuccessfully' => '$refresh', 'BookRequestDeletedSuccessfully' => '$refresh'];

    public function getRequestsProperty()
    {
        return BookRequest::with(['user', 'book'])
            ->whereHas("user", function ($q) {
                $q->when($this->search >= 2, function ($query) {
                    $query->where("name", 'LIKE', '%' . $this->search . '%');
                    $query->orWhere("email", 'LIKE', '%' . $this->search . '%');
                    $query->orWhere("mobile", 'LIKE', '%' . $this->search . '%');
                    return $query;
                });
            })
            ->when($this->filter == 1, function ($query) {
                return $query->whereNull('status');
            })
            ->when($this->filter == 2, function ($query) {
                return $query->where('status', 2);
            })
            ->when($this->filter == 3, function ($query) {
                return $query->where('status', 1);
            })
            ->latest()
            ->paginate(15);
    }

    public function view($id)
    {
        $this->emit("prepareRequestView", BookRequest::findOrFail($id));
    }

    public function viewUser($id)
    {
        $this->emit("prepareUserView", User::findOrFail($id));
    }

    public function delete($id)
    {
        $this->emit("prepareRequestDelete", BookRequest::findOrFail($id));
    }

    public function render()
    {
        return view('livewire.book-requests');
    }
}