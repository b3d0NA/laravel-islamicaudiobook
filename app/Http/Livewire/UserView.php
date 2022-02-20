<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserView extends Component
{
    public $user;
    public $isLoading = true;

    public $name;
    public $email;
    public $mobile;
    public $fb_link;
    public $gender;
    public $why_cant_buy_book;
    public $monthly_mobile_costs;
    public $occupation;
    public $internet_speed;
    public $is_promised;

    protected $listeners = ["prepareUserView"];

    public function prepareUserView(User $user)
    {
        $this->user = $user->with("survey")->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->fb_link = $user->fb_link;
        $this->why_cant_buy_book = $user->survey?->why_cant_buy_book;
        $this->monthly_mobile_costs = $user->survey?->monthly_mobile_costs;
        $this->occupation = $user->survey?->occupation;
        $this->internet_speed = $user->survey?->internet_speed;
        $this->is_promised = $user->survey?->is_promised;
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.user-view');
    }
}