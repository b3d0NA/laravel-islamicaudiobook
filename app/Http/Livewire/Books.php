<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\Listener;
use Livewire\Component;

class Books extends Component
{
    public $books;
    public $search;
    public $isLoading = true;

    public $nextCursor = null;
    public $hasMorePages = false;
    public $perPage = 10;

    protected $listeners = ["loadMore"];
    
    public function getRawBooksProperty(){
        return Book::when($this->search >= 2 , function ($query){
            $query->orWhere("name", 'LIKE', '%' . $this->search . '%');
            $query->orWhere("author", 'LIKE', '%' . $this->search . '%');
            $query->orWhere("publication", 'LIKE', '%' . $this->search . '%');
            return $query;
        })
        ->latest()
        ->cursorPaginate($this->perPage);
    }

    public function mount()
    {
        $this->books = $this->rawBooks->items();
        $this->isLoading = false;
        if ($this->hasMorePages = $this->rawBooks->hasMorePages()) {
            $this->nextCursor = $this->rawBooks->nextCursor()->encode();
        }
    }

    public function loadMore(){
        $this->isLoading = true;
        if($this->hasMorePages){
            $this->perPage = $this->perPage+5;
        }
        $this->isLoading = false;
    }

    public function read(Book $book){
        $book->increment("read");
    }

    public function render()
    {
        return view('livewire.books');
    }
}