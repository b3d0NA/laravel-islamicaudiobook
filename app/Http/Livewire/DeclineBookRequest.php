<?php

namespace App\Http\Livewire;

use App\Models\BookRequest;
use Livewire\Component;

class DeclineBookRequest extends Component
{
    public $isLoading = true;
    public $request;
    protected $listeners = ["prepareBookRequestDeclinal"];

    public function prepareBookRequestDeclinal(BookRequest $request)
    {
        $this->request = $request;
        $this->isLoading = false;
    }

    public function decline()
    {
        $this->request->update([
            "status" => 1,
        ]);

        $this->emit("BookRequestDeclinedSuccessfully", "Alhamduillah! Book request declined successfully!");
        $this->emit("CloseBookRequestView");
    }

    public function render()
    {
        return view('livewire.decline-book-request');
    }
}