<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(LoginRequest $request){
        if(auth()->attempt($request->only("email", "password"), true)){
            return redirect()->route("user.home");
        }else{
            return redirect()
                ->route("user.login.index")
                ->withErrors("Incorrect email or password!");
        }
    }

    public function register(RegisterRequest $request){
        User::create($request->validated());
        auth()->attempt($request->only("email", "password"));
        return redirect()
                ->route("user.home")
                ->with('toast.success', 'Succesfully Registered!');;
    }

    public function logout(){
        auth()->logout();
        return redirect()->route("user.home");
    }
}