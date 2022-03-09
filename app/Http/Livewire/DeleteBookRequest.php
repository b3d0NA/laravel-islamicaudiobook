<?php

namespace App\Http\Livewire;

use App\Models\BookRequest;
use Livewire\Component;

class DeleteBookRequest extends Component
{
    public $isLoading = true;
    public $request;
    protected $listeners = ["prepareRequestDelete"];

    public function prepareRequestDelete(BookRequest $request)
    {
        $this->request = $request;
        $this->isLoading = false;
    }

    public function delete()
    {
        $this->request->delete();

        $this->emit("BookRequestDeletedSuccessfully", "Alhamduillah! Book request deleted successfully!");
    }

    public function render()
    {
        return view('livewire.delete-book-request');
    }
}