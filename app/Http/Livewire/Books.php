<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;
    public $search;
    public $filter;
    public $perPage = 20;

    public function getBooksProperty()
    {
        return Book::where("status", "!=", "0")
            ->when($this->search >= 2, function ($query) {
                $query->Where("name", 'LIKE', '%' . $this->search . '%');
                $query->orWhere("author", 'LIKE', '%' . $this->search . '%');
                $query->orWhere("publication", 'LIKE', '%' . $this->search . '%');
                return $query;
            })
            ->when($this->filter, function ($query) {
                return $query->where("status", $this->filter);
            })
            ->when(auth()->check() && auth()->user()->paid_status == 1, function ($query) {
                return $query->whereBetween("status", [1, 2]);
            })
            ->latest()
            ->paginate($this->perPage);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        $this->resetPage();
    }

    public function read(Book $book)
    {
        $book->increment("read");
    }

    public function render()
    {
        return view('livewire.books');
    }
}
