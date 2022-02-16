<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Response;
use Livewire\Component;

class AddUsers extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $fb_link;
    public $gender;
    public $password;

    public function add(){
        (auth("admin")->guest()) && abort(Response::HTTP_FORBIDDEN);
        $validated = $this->validate([
            "name" => "required",
            "email" => "required|unique:users,email|email|ends_with:@gmail.com",
            "mobile" => "required",
            "fb_link" => "nullable",
            "gender" => "required",
            "password" => "required",
        ],
        [
            "name.required" => "Subhan ALLAH! User name must be filled.",
            "email.required" => "Subhan ALLAH! Please enter email address.",
            "mobile.required" => "Subhan ALLAH! Please enter mobile number.",
            "gender.required" => "Select a gender",
        ]);
        $user = User::create($validated);
        $this->emit("UserAddedSuccesfully", "Alhamdulillah! User added succesfully");
        $this->resetExcept("");
    }
    
    public function render()
    {
        return view('livewire.add-users');
    }
}