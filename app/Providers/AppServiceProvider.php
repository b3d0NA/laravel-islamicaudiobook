<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('maintenance', Setting::where("key", "maintenance")->select("key", "value")->first());
        View::share('registration_status', Setting::where("key", "registration_status")->select("key", "value")->first());
        View::share('totalVisits', DB::table(config('visitor.table_name'))->count());
    }
}
