<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class RequestBook extends Component
{
    public $promise_share;
    public $promise_screenshot;
    public $promise_download;
    public $expiration;
    public $is_sweared;

    public function request(Book $book)
    {
        $validated = $this->validate([
            "promise_share" => "required|integer",
            "promise_screenshot" => "required|integer",
            "promise_download" => "required|integer",
            "is_sweared" => "required|integer",
            "expiration" => "required|integer",
        ], [
            "promise_share.required" => "ইন্না লিল্লাহ! আপনাকে শেয়ার না করার ওয়াদা করতে হবে! ",
            "promise_screenshot.required" => "ইন্না লিল্লাহ! আপনাকে স্ক্রিনশট সেভ না করে রাখার ওয়াদা করতে হবে! ",
            "promise_download.required" => "ইন্না লিল্লাহ! আপনাকে ডাউনলোড না করার ওয়াদা করতে হবে! ",
            "expiration.required" => "ইন্না লিল্লাহ! আপনাকে বই পরার সময় উল্লেখ করতে হবে! ",
            "is_sweared.required" => "ইন্না লিল্লাহ! আপনাকে সবগুলো ওয়াদা করতে হবে! ",
        ]);

        if (auth()->user()->eligibleToRequest($book)) {
            $book->requests()->create([
                "user_id" => auth()->id(),
                ...$validated,
            ]);
        } else {
            return $this->addError("noteligible", "ইন্না লিল্লাহ! এই মুহূর্তে আপনি এই বই এর জন্য রিকোয়েস্ট করতে পারবেন না। ");
        }

        $this->emit("CloseRequestModal", "Alhamdulillah! We got your request");
        $this->emit("RefreshAllBooks");
        $this->resetExcept('');
    }

    public function render()
    {
        return view('livewire.request-book');
    }
}