<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class VirtualLibrary extends Component
{
    use WithPagination;

    protected $listeners = ["BookAddedSuccesfully" => '$refresh', "BookUpdatedSuccesfully" => '$refresh', "BookDeletedSuccessfully" => '$refresh', "BookStatusChangedSuccessfully" => '$refresh'];

    public $search;
    public $status;
    public function getBooksProperty(){
        return Book::when($this->search >= 2 , function ($query){
                        $query->Where("name", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("author", 'LIKE', '%' . $this->search . '%');
                        $query->orWhere("publication", 'LIKE', '%' . $this->search . '%');
                        return $query;
                    })
                    ->latest()
                    ->paginate(15);
    }


    public function updatedSearch(){
        $this->resetPage();
    }
    public function statusChange(Book $book, $value)
    {
        $this->emit("prepareBookStatusChange", $book, $value);
    }

    public function edit($id){
        $this->emit("prepareBookEdit", Book::findOrFail($id));
    }

    public function delete($id){
        $this->emit("prepareBookDelete", Book::findOrFail($id));
    }

    public function render()
    {
        return view('livewire.virtual-library');
    }
}