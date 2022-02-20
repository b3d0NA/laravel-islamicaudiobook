<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only("email", "password"), true)) {
            auth()->user()->update(["last_login_at" => now()->toDateTimeString()]);
            return redirect()->route("user.home");
        } else {
            return redirect()
                ->route("user.login.index")
                ->withErrors("Incorrect email or password!");
        }
    }

    public function register(RegisterRequest $request)
    {
        $reg_status = Setting::where("key", "registration_status")->select("key", "value")->first()->value;
        $reg_status == 0 && abort(404);
        User::create($request->validated());
        auth()->attempt($request->only("email", "password"));
        auth()->user()->update(["last_login_at" => now()->toDateTimeString()]);
        return redirect()
            ->route("user.survey.index");
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("user.home");
    }

    public function forgetPasswordIndex()
    {
        return view("user.auth.forgetpass");
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function passwordResetView(Request $request)
    {
        return view("user.auth.reset-password", ["token" => $request->token]);
    }

    public function passwordReset(PasswordResetRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password,
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('user.login.index')->with('resetpwd.status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}
