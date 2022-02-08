<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\UserChangePasswordRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $inactive_notice = Setting::where("key", "inactive_users_notice")->select("key", "value")->first();
        $active_notice = Setting::where("key", "active_users_notice")->select("key", "value")->first();
        $paid_notice = Setting::where("key", "paid_users_notice")->select("key", "value")->first();
        $guest_notice = Setting::where("key", "guests_notice")->select("key", "value")->first();
        return view('user.index', compact("inactive_notice", "active_notice", "paid_notice", "guest_notice"));
    }

    public function editProfileIndex(){
        $user = auth()->user();
        return view("user.edit", compact("user"));
    }

    public function editProfile(EditProfileRequest $request){
        auth()->user()->update($request->validated());
        return redirect()
            ->route("user.edit.index")
            ->with("success", "Alhamdulillah! Email updated sucessfully");
    }
    public function changePassword(UserChangePasswordRequest $request){
        auth()->user()->update(["password" => $request->new_password]);
        return redirect()
            ->route("user.edit.index")
            ->with("success", "Alhamdulillah! Password changed sucessfully");
    }
}