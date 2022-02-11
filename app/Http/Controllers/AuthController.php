<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(LoginRequest $request){
        if(auth()->attempt($request->only("email", "password"), true)){
            auth()->user()->update(["last_login_at" => now()->toDateTimeString()]);
            return redirect()->route("user.home");
        }else{
            return redirect()
                ->route("user.login.index")
                ->withErrors("Incorrect email or password!");
        }
    }

    public function register(RegisterRequest $request){
        $reg_status = Setting::where("key", "registration_status")->select("key", "value")->first()->value;
        $reg_status == 0 && abort(404);
        User::create($request->validated());
        auth()->attempt($request->only("email", "password"));
        auth()->user()->update(["last_login_at" => now()->toDateTimeString()]);
        return redirect()
                ->route("user.home")
                ->with('toast.success', 'Succesfully Registered!');;
    }

    public function logout(){
        auth()->logout();
        return redirect()->route("user.home");
    }
}