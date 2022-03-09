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

    protected $queryString = ["search"];

    protected $listeners = ["RefreshAllBooks" => '$refresh'];

    // public function mount()
    // {
    //     $book = Book::with(['requests' => function ($q) {
    //         $q->where("status", 2)->where("user_id", auth()->id());
    //     }])
    //         ->latest()
    //         ->take(3)
    //         ->get();

    //     dd($book);
    // }

    public function getBooksProperty()
    {
        return Book::with(['requests' => function ($q) {
            $q->when($this->filter === 3, function ($query) {
                $query->where("status", 2)->where("user_id", auth()->id());
            });
        }])
            ->when($this->filter === 3, function ($query) {
                $query->whereNotNull("requests");
            })
            ->where("status", "!=", "0")
            ->when($this->search >= 2, function ($query) {
                $query->where("name", 'LIKE', '%' . $this->search . '%');
                $query->orWhere("author", 'LIKE', '%' . $this->search . '%');
                $query->orWhere("publication", 'LIKE', '%' . $this->search . '%');
                return $query;
            })
            ->when(($this->filter == 1 || $this->filter == 2), function ($query) {
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