<?php

namespace App\Http\Livewire;

use App\Models\FeaturedBook;
use Livewire\Component;

class DeleteFeaturedBook extends Component
{
    public $isLoading = true;
    public $book;
    protected $listeners = ["prepareBookDelete"];

    public function prepareBookDelete(FeaturedBook $book){
        $this->book = $book;
        $this->isLoading = false;
    }

    public function delete(){
        $this->book->delete();
        $this->emit("BookDeletedSuccessfully", "Alhamdulillah! Book deleted succesfully");
    }
    
    public function render()
    {
        return view('livewire.delete-featured-book');
    }
}