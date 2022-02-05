<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notices extends Component
{
    public $active_notice;
    public $inactive_notice;
    public $paid_notice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($activeNotice, $inactiveNotice, $paidNotice)
    {
        $this->active_notice = $activeNotice; 
        $this->inactive_notice = $inactiveNotice; 
        $this->paid_notice = $paidNotice; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notices');
    }
}