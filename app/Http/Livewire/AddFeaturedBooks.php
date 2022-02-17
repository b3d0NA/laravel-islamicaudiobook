<?php

namespace App\Http\Livewire;

use App\Models\FeaturedBook;
use Illuminate\Http\Response;
use Livewire\Component;

class AddFeaturedBooks extends Component
{
    public $name;
    public $cover_link;
    public $read_link;
    public $expire_time;
    public $status;

    public function add(){
        (auth("admin")->guest()) && abort(Response::HTTP_FORBIDDEN);
        $validated = $this->validate([
            "name" => "required",
            "cover_link" => "required",
            "read_link" => "required",
            "expire_time" => "required|date",
            "status" => "required",
        ],
        [
            "name.required" => "Subhan ALLAH! Book name must be filled.",
            "cover_link.required" => "Enter a cover link",
            "read_link.required" => "Enter a read link",
        ]);
        $book = FeaturedBook::create($validated);
        $this->emit("BookAddedSuccesfully", "Alhamdulillah! Book added succesfully");
        $this->resetExcept("");
    }
    
    public function render()
    {
        return view('livewire.add-featured-books');
    }
}