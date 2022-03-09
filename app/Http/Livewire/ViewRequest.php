<?php

namespace App\Http\Livewire;

use App\Models\BookRequest;
use Livewire\Component;

class ViewRequest extends Component
{
    public $isLoading;
    public $request;
    public $book;
    public $bookName;
    public $bookCover;
    public $expiration;
    public $promise_share;
    public $promise_screenshot;
    public $promise_download;
    public $is_sweared;

    protected $listeners = ["prepareRequestView"];

    public function prepareRequestView(BookRequest $request)
    {
        $this->request = $request;
        $this->book = $request->with("book")->first();
        $this->bookName = $request->book->name;
        $this->bookCover = $request->book->cover_link;
        $this->expiration = $request->expiration;
        $this->promise_share = $request->promise_share;
        $this->promise_screenshot = $request->promise_screenshot;
        $this->promise_download = $request->promise_download;
        $this->is_sweared = $request->is_sweared;
        $this->isLoading = false;
    }

    public function approve()
    {
        return $this->emit("prepareBookRequestApproval", BookRequest::findOrFail($this->request->id));
    }

    public function decline()
    {
        return $this->emit("prepareBookRequestDeclinal", BookRequest::findOrFail($this->request->id));
    }

    public function render()
    {
        return view('livewire.view-request');
    }
}