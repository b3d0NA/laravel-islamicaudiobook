<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Http\Response;
use Livewire\Component;

class AddVlibBook extends Component
{
    public $name;
    public $author;
    public $publication;
    public $page_number;
    public $cover_link;
    public $read_link;
    public $short_link;
    public $status;

    public function add()
    {
        (auth("admin")->guest()) && abort(Response::HTTP_FORBIDDEN);
        $validated = $this->validate([
            "name" => "required",
            "author" => "required",
            "publication" => "required",
            "page_number" => "required|numeric",
            "cover_link" => "required",
            "read_link" => "required",
            "short_link" => "nullable",
            "status" => "required|nullable",
        ],
            [
                "name.required" => "Subhan ALLAH! Book name must be filled.",
                "author.required" => "Subhan ALLAH! Please enter author name.",
                "publication.required" => "Subhan ALLAH! Please enter publication.",
                "page_number.required" => "Please enter total pages of this book.",
                "page_number.numeric" => "Page number should be only a number no character",
                "cover_link.required" => "Enter a cover link",
                "read_link.required" => "Enter a read link",
            ]);
        $book = Book::create($validated);
        $this->emit("BookAddedSuccesfully", "Alhamdulillah! Book added succesfully");
        $this->resetExcept("");
    }

    public function render()
    {
        return view('livewire.add-vlib-book');
    }
}