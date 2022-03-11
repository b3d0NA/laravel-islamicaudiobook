<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Setting::factory()->create();
        Setting::factory()->create(["key" => "registration_status", "value" => "1"]);
        Setting::factory()->create(["key" => "inactive_users_notice", "value" => ""]);
        Setting::factory()->create(["key" => "active_users_notice", "value" => ""]);
        Setting::factory()->create(["key" => "paid_users_notice", "value" => ""]);
        Setting::factory()->create(["key" => "guests_notice", "value" => ""]);
        Setting::factory()->create(["key" => "terms_content", "value" => ""]);
        Setting::factory()->create(["key" => "disclaimer_content", "value" => ""]);
        Setting::factory()->create(["key" => "payment_content", "value" => ""]);
        Setting::factory()->create(["key" => "contact_email", "value" => ""]);
        Setting::factory()->create(["key" => "payment_page_status", "value" => ""]);
    }
}