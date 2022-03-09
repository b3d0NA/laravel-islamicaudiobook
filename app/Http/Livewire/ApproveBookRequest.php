<?php

namespace App\Http\Livewire;

use App\Models\BookRequest;
use Livewire\Component;

class ApproveBookRequest extends Component
{

    public $isLoading = true;
    public $request;
    public $expiration;
    protected $listeners = ["prepareBookRequestApproval"];

    public function prepareBookRequestApproval(BookRequest $request)
    {
        $this->request = $request;
        $this->isLoading = false;
    }

    public function approve()
    {
        $this->validate([
            "expiration" => "required",
        ], [
            "expiration.required" => "Expiration must need to be filled!",
        ]);
        $this->request->update([
            "status" => 2,
            "expiration" => $this->expiration,
        ]);

        $this->emit("BookRequestApprovedSuccesfully", "Alhamdulillah! Book Request approved successfully!");
        $this->emit("CloseBookRequestView");
    }

    public function render()
    {
        return view('livewire.approve-book-request');
    }
}