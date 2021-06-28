<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();;
            $table->string('phone_no')->nullable();;
            $table->string('gmail')->nullable();;
            $table->string('facebook')->nullable();;
            $table->string('twitter')->nullable();;
            $table->string('instagram')->nullable();;
            $table->string('youtube')->nullable();;
            $table->string('tiktok')->nullable();;
            $table->string('image')->nullable();;
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
        Schema::dropIfExists('home_settings');
    }
}
