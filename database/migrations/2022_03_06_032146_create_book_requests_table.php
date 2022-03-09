<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("book_id");
            $table->integer("status")->nullable();
            $table->integer("expiration");
            $table->integer("promise_share");
            $table->integer("promise_screenshot");
            $table->integer("promise_download");
            $table->integer("is_sweared");
            $table->integer("is_expired")->nullable()->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_requests');
    }
}