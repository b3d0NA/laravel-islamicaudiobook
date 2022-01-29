<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class EditVlibBook extends Component
{
    public $isLoading = true;
    public $book;

    public $name;
    public $author;
    public $publication;
    public $page_number;
    public $cover_link;
    public $read_link;

    protected $listeners = ["prepareBookEdit"];

    protected $rules = [
        "name" => "required",
        "author" => "required",
        "publication" => "required",
        "page_number" => "required|numeric",
        "cover_link" => "required",
        "read_link" => "required",
    ];

    protected $messages = [
        "name.required" => "Subhan ALLAH! Book name must be filled.",
        "author.required" => "Subhan ALLAH! Please enter author name.",
        "publication.required" => "Subhan ALLAH! Please enter publication.",
        "page_number.required" => "Please enter total pages of this book.",
        "page_number.numeric" => "Page number should be only a number no character",
        "cover_link.required" => "Enter a cover link",
        "read_link.required" => "Enter a read link",
    ];

    public function prepareBookEdit(Book $book){
        $this->book = $book;
        $this->name = $book->name;
        $this->author = $book->author;
        $this->publication = $book->publication;
        $this->page_number = $book->page_number;
        $this->cover_link = $book->cover_link;
        $this->read_link = $book->read_link;
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
        return view('livewire.edit-vlib-book');
    }
}