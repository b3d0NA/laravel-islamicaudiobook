<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $isLoading = true;
    public $user;

    public $name;
    public $email;
    public $mobile;
    public $fb_link;
    public $gender;
    public $password;

    protected $listeners = ["prepareUserEdit"];

    protected $rules = [
        "name" => "required",
        "email" => "required",
        "mobile" => "required|numeric",
        "gender" => "required",
    ];

    protected $messages = [
        "name.required" => "Subhan ALLAH! User must needs a name.",
        "email.required" => "Subhan ALLAH! User must needs an email address.",
        "mobile.required" => "Subhan ALLAH! User needs a mobile number.",
        "mobile.numeric" => "Subhan ALLAH! User mobile number only should be a number.",
        "gender.required" => "User doesn't have any gender?",
    ];

    public function prepareUserEdit(User $user){
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->fb_link = $user->fb_link;
        $this->gender = $user->gender;
        $this->isLoading = false;
    }

    public function save(){
        $this->validate();
        $this->user->update([
            "name" => $this->name,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "fb_link" => $this->fb_link,
            "gender" => $this->gender,
        ]);
        if($this->password){
            $this->user->update([
                "password" => $this->password,
            ]);
        }
        $this->emit("UserUpdatedSuccesfully", "Alhamdulillah! User updated successfully");
        $this->user->refresh();
        $this->resetExcept("");
    }

    public function render()
    {
        return view('livewire.user-edit');
    }
}