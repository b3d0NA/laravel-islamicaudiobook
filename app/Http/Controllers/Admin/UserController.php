<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserMessageRequest;
use App\Models\AdminMessage;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("admin.users.sendmail");
    }

    public function messages(){
        return view("admin.users.messages.index");
    }

    public function messagesView(User $user)
    {
        $messagesRaw = AdminMessage::where("user_id", $user->id);
        $messagesRaw->update(["is_read" => 1]);
        $messages = $messagesRaw->get();
        return view("admin.users.messages.view", compact("messages", "user"));
    }

    public function storeMessage(User $user, UserMessageRequest $request){
        AdminMessage::create([
            "user_id" => $user->id,
            "is_admin" => 1,
            "message" => $request->message
        ]);
        return redirect()->route('admin.users.messages.view', $user->id);
    }
}