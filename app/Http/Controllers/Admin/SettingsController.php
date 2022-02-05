<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $inactive_u_notice = Setting::where("key", "inactive_users_notice")->select("key", "value")->first();
        $active_u_notice = Setting::where("key", "active_users_notice")->select("key", "value")->first();
        $paid_u_notice = Setting::where("key", "paid_users_notice")->select("key", "value")->first();

        return view("admin.settings", compact("inactive_u_notice", "active_u_notice", "paid_u_notice"));
    }

    public function update(Request $request){
        Setting::where("key", "maintenance")
                ->update(["value" => $request->maintenance]);
        Setting::where("key", "inactive_users_notice")
            ->update(["value" => $request->inactive_users_notice]);
        Setting::where("key", "active_users_notice")
            ->update(["value" => $request->active_users_notice]);
        Setting::where("key", "paid_users_notice")
            ->update(["value" => $request->paid_users_notice]);
        
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }
}