<?php

namespace App\Http\Livewire;

use App\Models\FeaturedBook;
use Livewire\Component;

class ChangeFeaturedBookStatus extends Component
{

    public $isLoading = true;
    public $book;
    public $value;
    protected $listeners = ["prepareBookStatusChange"];

    public function prepareBookStatusChange(FeaturedBook $book, $value){
        $this->book = $book;
        $this->value = $value;
        $this->isLoading = false;
    }

    public function change(){
        $this->book->update(["status" => $this->value]);
        $this->emit("BookStatusChangedSuccessfully", "Alhamdulillah! Book status changed succesfully");
    }
    
    public function render()
    {
        return view('livewire.change-featured-book-status');
    }
}