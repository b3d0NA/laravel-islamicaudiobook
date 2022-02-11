<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index(){
        return view("admin.settings.index");
    }

    public function general(){
        $inactive_u_notice = Setting::where("key", "inactive_users_notice")->select("key", "value")->first();
        $active_u_notice = Setting::where("key", "active_users_notice")->select("key", "value")->first();
        $paid_u_notice = Setting::where("key", "paid_users_notice")->select("key", "value")->first();
        $guest_notice = Setting::where("key", "guests_notice")->select("key", "value")->first();

        return view("admin.settings.general", compact("inactive_u_notice", "active_u_notice", "paid_u_notice", "guest_notice"));
    }

    public function update(Request $request){
        Setting::where("key", "maintenance")
                ->update(["value" => $request->maintenance]);
        Setting::where("key", "registration_status")
                ->update(["value" => $request->registration]);
        Setting::where("key", "inactive_users_notice")
            ->update(["value" => $request->inactive_users_notice]);
        Setting::where("key", "active_users_notice")
            ->update(["value" => $request->active_users_notice]);
        Setting::where("key", "paid_users_notice")
            ->update(["value" => $request->paid_users_notice]);
        Setting::where("key", "guests_notice")
            ->update(["value" => $request->guests_notice]);
        
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }

    public function pages(){
        return view("admin.settings.pages.index");
    }

    public function terms(){
        $terms = Setting::where("key", "terms_content")->first()->value;
        return view("admin.settings.pages.terms", compact("terms"));
    }
    
    public function termsUpdate(Request $request){
        Setting::where("key", "terms_content")->update(["value" => $request->terms]);
        return back()
                ->with("success", "Alhamdulillah! Changes updated successfully.");
    }

    public function disclaimer(){
        $disclaimer = Setting::where("key", "disclaimer_content")->first()->value;
        return view("admin.settings.pages.disclaimer", compact("disclaimer"));
    }
    
    public function disclaimerUpdate(Request $request){
        Setting::where("key", "disclaimer_content")->update(["value" => $request->disclaimer]);
        return back()
                ->with("success", "Alhamdulillah! Changes updated successfully.");
    }

    public function contact(){
        $contact = Setting::where("key", "contact_email")->first()->value;
        return view("admin.settings.pages.contact", compact("contact"));
    }
    
    public function contactUpdate(Request $request){
        Setting::where("key", "contact_email")->update(["value" => $request->contact]);
        return back()
                ->with("success", "Alhamdulillah! Changes updated successfully.");
    }
}