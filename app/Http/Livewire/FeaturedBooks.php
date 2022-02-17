<?php

namespace App\Http\Livewire;

use App\Models\FeaturedBook;
use Livewire\Component;

class FeaturedBooks extends Component
{
    protected $listeners = ["BookAddedSuccesfully" => '$refresh', "BookUpdatedSuccesfully" => '$refresh', "BookDeletedSuccessfully" => '$refresh', "BookStatusChangedSuccessfully" => '$refresh'];

    public $search;
    public $status;
    public function getBooksProperty(){
        return FeaturedBook::when($this->search >= 2 , function ($query){
                        $query->Where("name", 'LIKE', '%' . $this->search . '%');
                        return $query;
                    })
                    ->latest()
                    ->paginate(15);
    }


    public function updatedSearch(){
        $this->resetPage();
    }
    public function statusChange(FeaturedBook $book, $value)
    {
        $this->emit("prepareBookStatusChange", $book, $value);
    }

    public function edit($id){
        $this->emit("prepareBookEdit", FeaturedBook::findOrFail($id));
    }

    public function delete($id){
        $this->emit("prepareBookDelete", FeaturedBook::findOrFail($id));
    }
    
    public function render()
    {
        return view('livewire.featured-books');
    }
}