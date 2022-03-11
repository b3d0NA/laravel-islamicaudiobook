<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPaymentRequest;
use App\Models\Setting;

class UserPaymentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $paymentContent = Setting::where("key", "payment_content")->first()->value;
        $paymentStatus = Setting::where("key", "payment_page_status")->first()->value;
        $payments = auth()->user()->payments()->limit(10)->latest()->get();
        return view("user.payment", compact("user", "paymentContent", "payments", "paymentStatus"));
    }

    public function store(UserPaymentRequest $request)
    {
        auth()->user()->payments()->create($request->validated());
        return redirect()
            ->route("user.payment.index")
            ->with("success", "Alhamdulillah! Admin recieved your payment claim. Soon you will be paid member In Shaa Allah!");
    }
}