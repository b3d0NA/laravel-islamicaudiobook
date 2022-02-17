<?php

namespace App\View\Components;

use App\Models\FeaturedBook;
use Illuminate\View\Component;

class FeaturedBooks extends Component
{

    public $books;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->books = FeaturedBook::where("status", 1)->latest()->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.featured-books');
    }
}
