<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsPagesController extends Controller
{
    public function index()
    {
        return view("admin.settings.pages.index");
    }

    public function terms()
    {
        $terms = Setting::where("key", "terms_content")->first()->value;
        return view("admin.settings.pages.terms", compact("terms"));
    }

    public function termsUpdate(Request $request)
    {
        Setting::where("key", "terms_content")->update(["value" => $request->terms]);
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }

    public function disclaimer()
    {
        $disclaimer = Setting::where("key", "disclaimer_content")->first()->value;
        return view("admin.settings.pages.disclaimer", compact("disclaimer"));
    }

    public function disclaimerUpdate(Request $request)
    {
        Setting::where("key", "disclaimer_content")->update(["value" => $request->disclaimer]);
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }

    public function payment()
    {
        $paymentStatus = Setting::where("key", "payment_page_status")->first()->value;
        $payment = Setting::where("key", "payment_content")->first()->value;
        return view("admin.settings.pages.payment", compact("payment", "paymentStatus"));
    }

    public function paymentUpdate(Request $request)
    {
        Setting::where("key", "payment_content")->update(["value" => $request->payment]);
        Setting::where("key", "payment_page_status")->update(["value" => $request->payment_page_status]);
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }

    public function contact()
    {
        $contact = Setting::where("key", "contact_email")->first()->value;
        return view("admin.settings.pages.contact", compact("contact"));
    }

    public function contactUpdate(Request $request)
    {
        Setting::where("key", "contact_email")->update(["value" => $request->contact]);
        return back()
            ->with("success", "Alhamdulillah! Changes updated successfully.");
    }
}