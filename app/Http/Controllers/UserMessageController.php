<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserMessageRequest;
use App\Models\Admin;
use App\Models\AdminMessage;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function index(){
        $messages = auth()->user()->messages;
        return view("user.messages", compact("messages"));
    }

    public function store(UserMessageRequest $request){
        auth()->user()->messages()->create($request->validated());
        return redirect()->route('user.messages.index');
    }
}