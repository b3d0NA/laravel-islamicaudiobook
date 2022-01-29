<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminChangePasswordRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:5,1')->only('login');
    }

    public function login(AdminLoginRequest $request){
        if(auth("admin")->attempt($request->only("email", "password"))){
            return redirect()
                ->route("admin.dashboard");
        }else{
            return redirect()
                ->route("admin.login.index")
                ->withErrors("Invalid login!");
        }
    }

    public function changePassword(AdminChangePasswordRequest $request){
        auth("admin")->user()->update(["password" => $request->new_password]);
        return redirect()
                ->route("admin.changepwd.index")
                ->with("success", "Alhamdulillah! Password has changed.");
    }

    public function logout(){
        auth("admin")->logout();
        return redirect()->route("admin.login.index");
    }
}