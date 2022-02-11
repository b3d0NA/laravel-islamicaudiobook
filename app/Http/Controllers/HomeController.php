<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\UserChangePasswordRequest;
use App\Mail\ContactMailer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Ramsey\Uuid\v1;

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

    public function terms(){
        $terms = Setting::where("key", "terms_content")->first()->value;
        return view("user.terms", compact("terms"));
    }

    public function disclaimers(){
        $disclaimer = Setting::where("key", "disclaimer_content")->first()->value;
        return view("user.disclaimers", compact("disclaimer"));
    }

    public function contact(){
        return view("user.contact");
    }

    public function contactSendMail(ContactRequest $request){
        $mailTo = Setting::where('key', "contact_email")->first()->value;
        Mail::to($mailTo)
            ->send(new ContactMailer($request->name, $request->email, $request->subject, $request->message));
        return redirect()->route("user.pages.contact")
                ->with("success", "Alhamdulillah! Admin got your message. Will response ASAP");
    }
}