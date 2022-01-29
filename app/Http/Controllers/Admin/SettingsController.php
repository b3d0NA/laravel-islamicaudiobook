<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $maintenance = Setting::where("key", "maintenance")->select("key", "value")->first();

        return view("admin.settings", compact("maintenance"));
    }

    public function update(Request $request){
        Setting::where("key", "maintenance")
                ->update(["value" => $request->maintenance]);
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }
}