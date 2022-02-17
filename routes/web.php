<?php
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\VirtualLibraryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FeaturedBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsPagesController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\UserPaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name("user.home");
Route::get("terms", [HomeController::class, "terms"])->name("user.pages.terms");
Route::get("disclaimers", [HomeController::class, "disclaimers"])->name("user.pages.disclaimers");
Route::get("contact", [HomeController::class, "contact"])->name("user.pages.contact");
Route::post("contact", [HomeController::class, "contactSendMail"])->name("user.contact.sendmail");
Route::middleware("auth")->group(function (){
    Route::get('edit/profile', [HomeController::class, "editProfileIndex"])->name("user.edit.index");

    Route::get('messages', [UserMessageController::class, "index"])->name("user.messages.index");
    Route::post('messages', [UserMessageController::class, "store"])->name("user.messages.store");

    Route::post('edit/profile', [HomeController::class, "editProfile"])->name("user.edit");
    Route::post('user/changepassword', [HomeController::class, "changePassword"])->name("user.changepwd");

    Route::get('payment', [UserPaymentController::class, "index"])->name("user.payment.index");
    Route::post('payment', [UserPaymentController::class, "store"])->name("user.payment.store");

    Route::post("logout", [AuthController::class, "logout"])->name("user.logout");
});

Route::middleware("guest")->group(function (){
    Route::view("login", "user.auth.login")->name("user.login.index");
    Route::post("login", [AuthController::class, "login"])->name("user.login");
    Route::view("register", "user.auth.register")->name("user.register.index");
    Route::post("register", [AuthController::class, "register"])->name("user.register");
    
});

Route::middleware(['admin.auth'])->prefix("admin")->group(function () {
    Route::get('dashboard', [DashboardController::class, "index"])->name("admin.dashboard");
    Route::view('change-password', 'admin.change-password')->name("admin.changepwd.index");
    Route::post('change-password', [AdminAuthController::class, 'changePassword'])->name("admin.changepwd");
    Route::get('vlib', [VirtualLibraryController::class, "index"])->name("admin.vlib.index");
    Route::get('featuredbooks', [FeaturedBookController::class, "index"])->name("admin.fbooks.index");
    Route::view('payments', 'admin.users.payments')->name("admin.users.payments.index");
    Route::view('users', "admin.users.index")->name("admin.users.index");
    Route::get('sendmail', [UserController::class, "index"])->name("admin.users.sendmail.index");
    Route::get('messages', [UserController::class, "messages"])->name("admin.users.messages.index");
    Route::get('messages/{user:id}', [UserController::class, "messagesView"])->name("admin.users.messages.view");
    Route::post('messages/{user:id}', [UserController::class, "storeMessage"])->name("admin.users.messages.store");


    Route::prefix("settings")->group(function (){
        Route::get('settings', [SettingsController::class, "index"])->name("admin.settings.index");
        Route::get('general', [SettingsController::class, "general"])->name("admin.settings.general.index");
        Route::post('general', [SettingsController::class, "update"])->name("admin.settings.general.update");

        Route::prefix("pages")->group(function (){
            Route::get("index", [SettingsPagesController::class, "index"])->name("admin.settings.pages.index");

            Route::get("terms", [SettingsPagesController::class, "terms"])->name("admin.settings.pages.terms.index");
            Route::post("terms", [SettingsPagesController::class, "termsUpdate"])->name("admin.settings.pages.terms.update");
            Route::get("disclaimer", [SettingsPagesController::class, "disclaimer"])->name("admin.settings.pages.disclaimer.index");
            Route::post("disclaimer", [SettingsPagesController::class, "disclaimerUpdate"])->name("admin.settings.pages.disclaimer.update");
            Route::get("payment", [SettingsPagesController::class, "payment"])->name("admin.settings.pages.payment.index");
            Route::post("payment", [SettingsPagesController::class, "paymentUpdate"])->name("admin.settings.pages.payment.update");

            Route::get("contact", [SettingsPagesController::class, "contact"])->name("admin.settings.pages.contact.index");
            Route::post("contact", [SettingsPagesController::class, "contactUpdate"])->name("admin.settings.pages.contact.update");
        });
    });

    
    Route::post('logout', [AdminAuthController::class, "logout"])->name("admin.logout");
});

Route::middleware(['admin.guest'])->prefix("admin")->group(function(){
    Route::view('login', 'admin.auth.login')->name("admin.login.index");
    Route::post('login', [AdminAuthController::class, "login"])->name("admin.login");
});

Route::get("artisan", function (){
    Artisan::call('migrate --seed');
    Artisan::call("cache:clear");
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    echo"Done Alhamdulillah!";
});