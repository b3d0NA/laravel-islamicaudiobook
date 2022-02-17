<?php

namespace App\Http\Livewire;

use App\Models\FeaturedBook;
use Livewire\Component;

class EditFeaturedBook extends Component
{
    public $isLoading = true;
    public $book;

    public $name;
    public $cover_link;
    public $read_link;
    public $expire_time;
    public $status;

    protected $listeners = ["prepareBookEdit"];

    protected $rules = [
        "name" => "required",
        "cover_link" => "required",
        "read_link" => "required",
        "expire_time" => "required|date",
    ];

    protected $messages = [
        "name.required" => "Subhan ALLAH! Book name must be filled.",
        "cover_link.required" => "Enter a cover link",
        "read_link.required" => "Enter a read link",
    ];

    public function prepareBookEdit(FeaturedBook $book){
        $this->book = $book;
        $this->name = $book->name;
        $this->cover_link = $book->cover_link;
        $this->read_link = $book->read_link;
        $this->expire_time = $book->expire_time->format("Y-m-d");
        $this->isLoading = false;
    }

    public function save(){
        $validated = $this->validate();
        $this->book->update($validated);
        $this->emit("BookUpdatedSuccesfully", "Alhamdulillah! Book updated successfully");
        $this->book->refresh();
    }
    
    public function render()
    {
        return view('livewire.edit-featured-book');
    }
}